<?php
/**
 * Controller to add/delete and change users facebook accounts data in DB
 * User: fishouk.alexey
 * Date: 29.11.2016
 * Time: 14:33
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User_facebook_accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ManageUserFacebookAccountsController extends Controller
{
    public static function postShowFacebookSecretToken (Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserFacebookAccounts = new User_Facebook_accounts();
        $result = $UserFacebookAccounts::showFacebookSecretToken($id, $id_user, $self_token);
        $result = $result[0]->facebook_access_token;

        unset($UserFacebookAccounts);
        return $result;
    }

    public static function postDeleteFacebookAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserFacebookAccounts = new User_Facebook_accounts();
        $UserFacebookAccounts::deleteFacebookAccount($id, $id_user, $self_token);
        $result = self::getFacebookData();

        unset($UserFacebookAccounts);
        return $result;
    }

    public static function getFacebookData()
    {
        $i = 1;
        $result = "";
        $userObjectFacebookAccounts = new User_Facebook_accounts();
        $userFacebookAccounts = $userObjectFacebookAccounts::getFacebookAccounts(Auth::User()->id);

        if ($userFacebookAccounts) {
            $result .= '<table class="table table-bordered">';
            $result .= '<thead>';
            $result .= '<tr>';
            $result .= '<th class="text-center">N</th>';
            $result .= '<th class="text-center">Account status</th> <!-- test correct select by user id -->';
            $result .= '<th class="text-center">Facebook id</th>';
            $result .= '<th class="text-center">Facebook login</th>';
            $result .= '<th class="text-center">Facebook access token</th>';
            $result .= '<th class="text-center">Token end of life</th>';
            //$result .= '<th class="text-center">Edit</th>';//Delete if no more need
            $result .= '<th class="text-center">Delete</th>';
            $result .= '</tr>';
            $result .= '</thead>';
            $result .= '<tbody>';
            foreach ($userFacebookAccounts as $user_facebook_account) {
                $result .= '<tr>';
                $result .= '<td class="fill-number-in-rows text-center">' . $i . '.</td>';
                $result .= '<td class="text-center">';
                if($user_facebook_account->authorization == "0"):
                    $result .= '<a href="'. route('api.user_facebook') . '" style="color: #fff">';
                    $result .= '<button type="button" class="btn btn-dunger">
                                            Get authorization';
                    $result .= '</button>';
                    $result .= '</a></td>';
                else:
                    $result .= '<button type="button" class="btn btn-success">
                                        Authorized';
                    $result .= '</button>';
                endif;

                $result .= '<td class="text-center">' . $user_facebook_account-> id_user_facebook. '</td>';
                $result .= '<td class="text-center">' . $user_facebook_account-> user_facebook_login. '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-info" id="show_facebook_token_secret_' . $user_facebook_account->id . '" onclick="show_facebook_secret_token(' . Auth::User()->id . ',' . $user_facebook_account->id . ',' . "'"  . $user_facebook_account->self_token . "'" . ')" data-dismiss="modal" title="show key">
                    SHOW KEY
                </button>';
                $result .= '</td>';
                $result .= '<td class="text-center">' . $user_facebook_account->date_end_of_life . '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-danger" id="del_facebook_account_' . $user_facebook_account->id . '" onclick="open_modal_window_delete_facebook_account(' . Auth::User()->id . ',' . $user_facebook_account->id . ',' . "'" . $user_facebook_account->self_token . "'" . ')" data-dismiss="modal" title="delete">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>';
                $result .= '</td>';
                $result .= '</tr>';
                $i++;
            }
            $result .= '</tbody>';
            $result .= '</table>';
            unset($userObjectFacebookAccounts);
            return $result;
        } else {
            $result = "<p>Sorry, you have now accounts to show. Please add new.</p>";
            unset($userObjectFacebookAccounts);
            return $result;
        }
    }

    public static function openModalWindowDeleteFacebookAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $result .= '<!-- Modal to delete facebook accounts -->';
        $result .= '<div class="modal-dialog" role="document">';
        $result .= '<div class="modal-content">';
        $result .= '<!-- Modal Header -->';
        $result .= '<div class="modal-header">';
        $result .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= '<h4 class="modal-title" id="add_user_facebook_accounts_label">Warning!</h4>';
        $result .= '</div>';
        $result .= '<!-- Modal Body -->';
        $result .= '<div class="modal-body">';
        $result .= '<!-- Modal Actions -->';
        $result .= '<p>Are you sure to delete your Facebook account?</p>';
        $result .= '</div>';
        $result .= '<div class="modal-footer">';
        $result .= '<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">';
        $result .= '<button type="button" class="btn btn-success"  data-dismiss="modal" onclick="delete_facebook_account( ' . $id_user . ', ' . $id . ',' . "'" . $self_token . "'" . ')">Yes</button>';
        $result .= '<button type="button" class="btn btn-danger"  data-dismiss="modal">No</button>';
        $result .= '<input type="hidden" name="_token" value="{{ Session::token() }}">';
        $result .= '</div>';
        $result .= '</div>';
        $result .= '</div>';

        return $result;
    }

    public function loginWithFacebook(Request $request)
    {

        // get data from request
        $code = $request->get('code');
        // get fb service
        $fb = \OAuth::consumer('Facebook');
        // if code is provided get user data and sign in
        if ( ! is_null($code))
        {
            // print_r($code);
            // return response()->json(['mycode' => $request->get('code')], 200);
            // exit;
            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken($code);
            // Send a request with it
            $result = json_decode($fb->request('/me'), true);

            $id_user = Auth::user()->id;
            $user_facebook_login = $result['name'];
            $id_user_facebook = $result['id'];
            $facebook_access_token = $token->getAccessToken();
            $date_end_of_life = $token->getEndOfLife();
            $authorization = true;

            $UserFacebookAccounts = new User_facebook_accounts();
            $checkFacebookAccount = $UserFacebookAccounts::checkFAcebookAccount($id_user_facebook);

            if ($checkFacebookAccount == true) {
                $UserFacebookAccounts::setMainVariables($id_user, $id_user_facebook, $user_facebook_login, $facebook_access_token, $date_end_of_life, $authorization);
                $UserFacebookAccounts::addUserFacebookAccount();
            } else {
                return Redirect::to("user_social_accounts?account=facebook");
            }

            unset($checkFacebookAccount);

            return Redirect::to("user_social_accounts?account=facebook");
        }
        else
        {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return redirect((string)$url);
        }
    }
}