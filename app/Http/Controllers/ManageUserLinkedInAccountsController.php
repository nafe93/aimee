<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 28.02.2017
 * Time: 11:28
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User_LinkedIn_Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ManageUserLinkedInAccountsController extends Controller
{
    public static function postShowLinkedInSecretToken (Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserFacebookAccounts = new User_LinkedIn_accounts();
        $result = $UserFacebookAccounts::showLinkedInSecretToken($id, $id_user, $self_token);
        $result = $result[0]->linkedin_access_token;

        unset($UserLinkedInAccounts);
        return $result;
    }


    public static function postDeleteLinkedInAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserFacebookAccounts = new User_LinkedIn_Accounts();
        $UserFacebookAccounts::deleteLinkedInAccount($id, $id_user, $self_token);
        $result = self::getLinkedInData();

        unset($UserFacebookAccounts);
        return $result;
    }
    public static function openModalWindowDeleteLinkedInAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $result .= '<!-- Modal to delete linkedin accounts -->';
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
        $result .= '<button type="button" class="btn btn-success"  data-dismiss="modal" onclick="delete_linkedin_account( ' . $id_user . ', ' . $id . ',' . "'" . $self_token . "'" . ')">Yes</button>';
        $result .= '<button type="button" class="btn btn-danger"  data-dismiss="modal">No</button>';
        $result .= '<input type="hidden" name="_token" value="{{ Session::token() }}">';
        $result .= '</div>';
        $result .= '</div>';
        $result .= '</div>';

        return $result;
    }
    public static function getLinkedInData()
    {
        $i = 1;
        $result = "";
        $userObjectLinkedInAccounts = new User_LinkedIn_Accounts();
        $userLinkedInAccounts = $userObjectLinkedInAccounts::getLinkedInAccounts(Auth::User()->id);

        if ($userLinkedInAccounts) {
            $result .= '<table class="table table-bordered">';
            $result .= '<thead>';
            $result .= '<tr>';
            $result .= '<th class="text-center">N</th>';
            $result .= '<th class="text-center">Account status</th> <!-- test correct select by user id -->';
            $result .= '<th class="text-center">LinkedIn id</th>';
            $result .= '<th class="text-center">LinkedIn name</th>';
            $result .= '<th class="text-center">LinkedIn access token</th>';
            $result .= '<th class="text-center">Token end of life</th>';
            //$result .= '<th class="text-center">Edit</th>';//Delete if no more need
            $result .= '<th class="text-center">Delete</th>';
            $result .= '</tr>';
            $result .= '</thead>';
            $result .= '<tbody>';
            foreach ($userLinkedInAccounts as $user_linkedin_account) {
                $result .= '<tr>';
                $result .= '<td class="fill-number-in-rows text-center">' . $i . '.</td>';
                $result .= '<td class="text-center">';
                if($user_linkedin_account->authorization == "0"):
                    $result .= '<a href="'. route('api.user_linkedin') . '" style="color: #fff">';
                    $result .= '<button type="button" class="btn btn-dunger">
                                            Get authorization';
                    $result .= '</button>';
                    $result .= '</a></td>';
                else:
                    $result .= '<button type="button" class="btn btn-success">
                                        Authorized';
                    $result .= '</button>';
                endif;

                $result .= '<td class="text-center">' . $user_linkedin_account-> id_user_linkedin. '</td>';
                $result .= '<td class="text-center">' . $user_linkedin_account-> user_linkedin_name. '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-info" id="show_linkedin_token_secret_' . $user_linkedin_account->id . '" onclick="show_linkedin_secret_token(' . Auth::User()->id . ',' . $user_linkedin_account->id . ',' . "'"  . $user_linkedin_account->self_token . "'" . ')" data-dismiss="modal" title="show key">
                    SHOW KEY
                </button>';
                $result .= '</td>';
                $result .= '<td class="text-center">' . $user_linkedin_account->date_end_of_life . '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-danger" id="del_linkedin_account_' . $user_linkedin_account->id . '" onclick="open_modal_window_delete_linkedin_account(' . Auth::User()->id . ',' . $user_linkedin_account->id . ',' . "'" . $user_linkedin_account->self_token . "'" . ')" data-dismiss="modal" title="delete">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>';
                $result .= '</td>';
                $result .= '</tr>';
                $i++;
            }
            $result .= '</tbody>';
            $result .= '</table>';
            unset($userObjectLinkedInAccounts);
            return $result;
        } else {
            $result = "<p>Sorry, you have now accounts to show. Please add new.</p>";
            unset($userObjectLinkedInAccounts);
            return $result;
        }
    }

    public function loginWithLinkedIn(Request $request)
    {
        // get data from request
        $code = $request->get('code');
        $state = $request->get('state');
        // get fb service
            // $OAuth = new \OAuth();
            // $OAuth::setHttpClient('CurlClient');
            // $ln = $OAuth::consumer('Linkedin');
        $ln = \OAuth::consumer('Linkedin');
        // if code is provided get user data and sign in
        if ( ! is_null($code) && !is_null($state))
        {
            // This was a callback request from linkedin, get the token
            $token = $ln->requestAccessToken($code);
            $result = json_decode($ln->request('/people/~?format=json'), true);
                /*try{
                    // This was a callback request from facebook, get the token
                    $token = $ln->requestAccessToken( $code );
                    // Send a request with it
                    $result = json_decode( $fb->request(), true );
                } catch(Exception $e){
                    return Redirect::to('auth/login')->with("sys_message", ["body"=>"An error occurred please try again."]);
                }*/
            $id_user = Auth::user()->id;
            $user_linkedin_name = $result['firstName'].' '.$result['lastName'];
            $id_user_linkedin = $result['id'];
            $user_headline = $result['headline'];
            $linkedin_access_token = $token->getAccessToken();
            $date_end_of_life = $token->getEndOfLife();
            $authorization = true;

            // Send a request with it
            $UserLinkedInAccounts = new User_LinkedIn_accounts();
            $checkLinkedInAccount = $UserLinkedInAccounts::checkLinkedInAccount($id_user_linkedin);

            if ($checkLinkedInAccount == true) {
                $UserLinkedInAccounts::setMainVariables($id_user, $id_user_linkedin, $user_linkedin_name, $linkedin_access_token, $date_end_of_life, $authorization);
                $UserLinkedInAccounts::addUserLinkedInAccount();
            } else {
                return Redirect::to("user_social_accounts?account=linkedin");
            }

            unset($checkLinkedInAccount);


            return Redirect::to("user_social_accounts?account=linkedin");
        }
        else
        {
            // get fb authorization
            $url = $ln->getAuthorizationUri();
            // return to linkedin login url
            return redirect((string)$url);
        }
    }

}