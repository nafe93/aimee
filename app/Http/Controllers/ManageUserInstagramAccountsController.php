<?php
/**
 * Created by PhpStorm.
 * User: abloko
 * Date: 05.03.17
 * Time: 13:14
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User_Instagram_Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ManageUserInstagramAccountsController extends Controller
{
    public static function postShowInstagramSecretToken (Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserInstagramAccounts = new User_Instagram_accounts();
        $result = $UserInstagramAccounts::showInstagramSecretToken($id, $id_user, $self_token);
        $result = $result[0]->instagram_access_token;

        unset($UserInstagramAccounts);
        return $result;
    }
    public function loginWithInstagram(Request $request)
    {
        $code = $request->get('code');
        $state = $request->get('state');
        // get fb service
        $ln = \OAuth::consumer('Instagram');
        // if code is provided get user data and sign in
        if ( ! is_null($code) && !is_null($state))
        {
            $token = $ln->requestAccessToken($code);
            $id_user = Auth::user()->id;
            $instagram_access_token = $token->getAccessToken();
            $date_end_of_life = $token->getEndOfLife();
            $result = json_decode($ln->request('users/self'), true);
            $id_user_instagram = $result['data']['id'];
            $user_instagram_name = $result['data']['username'];
            $authorization = true;

            $UserInstagramAccounts = new User_Instagram_accounts();
            $checkInstagramAccount = $UserInstagramAccounts::checkInstagramAccount($id_user_instagram);

            if ($checkInstagramAccount == true) {
                $UserInstagramAccounts::setMainVariables($id_user, $id_user_instagram, $user_instagram_name, $instagram_access_token, $date_end_of_life, $authorization);
                $UserInstagramAccounts::addUserInstagramAccount();
            } else {
                return Redirect::to("user_social_accounts?account=instagram");
            }
            unset($checkInstagramAccount);
            return Redirect::to("user_social_accounts?account=instagram");
        }
        else
        {
            // get fb authorization
            $url = $ln->getAuthorizationUri();
            // return to instagram login url
            return redirect((string)$url);
        }
    }
    public static function getInstagramData()
    {
        $i = 1;
        $result = "";
        $userObjectInstagramAccounts = new User_Instagram_Accounts();
        $userInstagramAccounts = $userObjectInstagramAccounts::getInstagramAccounts(Auth::User()->id);

        if ($userInstagramAccounts) {
            $result .= '<table class="table table-bordered">';
            $result .= '<thead>';
            $result .= '<tr>';
            $result .= '<th class="text-center">N</th>';
            $result .= '<th class="text-center">Account status</th> <!-- test correct select by user id -->';
            $result .= '<th class="text-center">Instagram id</th>';
            $result .= '<th class="text-center">Instagram user</th>';
            $result .= '<th class="text-center">Instagram access token</th>';
            $result .= '<th class="text-center">Token end of life</th>';
            //$result .= '<th class="text-center">Edit</th>';//Delete if no more need
            $result .= '<th class="text-center">Delete</th>';
            $result .= '</tr>';
            $result .= '</thead>';
            $result .= '<tbody>';
            foreach ($userInstagramAccounts as $user_instagram_account) {
                $result .= '<tr>';
                $result .= '<td class="fill-number-in-rows text-center">' . $i . '.</td>';
                $result .= '<td class="text-center">';
                if($user_instagram_account->authorization == "0"):
                    $result .= '<a href="'. route('api.user_instagram') . '" style="color: #fff">';
                    $result .= '<button type="button" class="btn btn-dunger">
                                            Get authorization';
                    $result .= '</button>';
                    $result .= '</a></td>';
                else:
                    $result .= '<button type="button" class="btn btn-success">
                                        Authorized';
                    $result .= '</button>';
                endif;

                $result .= '<td class="text-center">' . $user_instagram_account-> id_user_instagram. '</td>';
                $result .= '<td class="text-center">' . $user_instagram_account-> user_instagram_name. '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-info" id="show_instagram_token_secret_' . $user_instagram_account->id . '" onclick="show_instagram_secret_token(' . Auth::User()->id . ',' . $user_instagram_account->id . ',' . "'"  . $user_instagram_account->self_token . "'" . ')" data-dismiss="modal" title="show key">
                    SHOW KEY
                </button>';
                $result .= '</td>';
                $result .= '<td class="text-center">' . $user_instagram_account->date_end_of_life . '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-danger" id="del_instagram_account_' . $user_instagram_account->id . '" onclick="open_modal_window_delete_instagram_account(' . Auth::User()->id . ',' . $user_instagram_account->id . ',' . "'" . $user_instagram_account->self_token . "'" . ')" data-dismiss="modal" title="delete">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>';
                $result .= '</td>';
                $result .= '</tr>';
                $i++;
            }
            $result .= '</tbody>';
            $result .= '</table>';
            unset($userObjectInstagramAccounts);
            return $result;
        } else {
            $result = "<p>Sorry, you have now accounts to show. Please add new.</p>";
            unset($userObjectInstagramAccounts);
            return $result;
        }
    }

    public static function openModalWindowDeleteInstagramAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $result .= '<!-- Modal to delete instagram accounts -->';
        $result .= '<div class="modal-dialog" role="document">';
        $result .= '<div class="modal-content">';
        $result .= '<!-- Modal Header -->';
        $result .= '<div class="modal-header">';
        $result .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= '<h4 class="modal-title" id="add_user_instagram_accounts_label">Warning!</h4>';
        $result .= '</div>';
        $result .= '<!-- Modal Body -->';
        $result .= '<div class="modal-body">';
        $result .= '<!-- Modal Actions -->';
        $result .= '<p>Are you sure to delete your Instagram account?</p>';
        $result .= '</div>';
        $result .= '<div class="modal-footer">';
        $result .= '<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">';
        $result .= '<button type="button" class="btn btn-success"  data-dismiss="modal" onclick="delete_instagram_account( ' . $id_user . ', ' . $id . ',' . "'" . $self_token . "'" . ')">Yes</button>';
        $result .= '<button type="button" class="btn btn-danger"  data-dismiss="modal">No</button>';
        $result .= '<input type="hidden" name="_token" value="{{ Session::token() }}">';
        $result .= '</div>';
        $result .= '</div>';
        $result .= '</div>';

        return $result;
    }

    public static function postDeleteInstagramAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserInstagramAccounts = new User_Instagram_accounts();
        $UserInstagramAccounts::deleteInstagramAccount($id, $id_user, $self_token);
        $result = self::getInstagramData();

        unset($UserInstagramAccounts);
        return $result;
    }
}