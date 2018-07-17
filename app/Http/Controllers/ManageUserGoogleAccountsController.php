<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 06.03.2017
 * Time: 12:44
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User_Google_accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ManageUserGoogleAccountsController extends Controller
{
    public static function postShowGoogleSecretToken (Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserGoogleAccounts = new User_Google_accounts();
        $result = $UserGoogleAccounts::showGoogleSecretToken($id, $id_user, $self_token);
        $result = $result[0]->google_access_token;

        unset($UserGoogleAccounts);
        return $result;
    }
    public function loginWithGoogle(Request $request)
    {
        $code = $request->get('code');
        $state = $request->get('state');
        // get g+ service
        $client = new \Google_Client();
        $client->setAuthConfig('/var/www/aimee/app/Plugins/client_google_config.json');
        $client->setAccessType ("offline");
        $client->setApprovalPrompt ("force");

        $ln = \OAuth::consumer('Google');
        if ( ! is_null($code) )
        {
            $token = $client->fetchAccessTokenWithAuthCode($code);
            $client->setAccessToken($token);
            $google_access_token = \GuzzleHttp\json_encode($token);//serialize($token);
            $AObj = json_decode($google_access_token);
            $refresh_token = $AObj->{'refresh_token'};
            $oauth2 = new \Google_Service_Oauth2($client);
            $user_google_name  = $oauth2->userinfo->get()->email;
            $id_user_google =  $oauth2->userinfo->get()->id;
            $id_user = Auth::user()->id;
            $date_end_of_life = 3600;//$token->getEndOfLife();
            $authorization = true;

            $UserGoogleAccounts = new User_Google_accounts();
           $checkGoogleAccount = $UserGoogleAccounts::checkGoogleAccount($id_user_google);

            if ($checkGoogleAccount == true) {
                $UserGoogleAccounts::setMainVariables($id_user, $id_user_google, $user_google_name, $google_access_token, $date_end_of_life, $authorization, $refresh_token);
                $UserGoogleAccounts::addUserGoogleAccount();
           } else {
                return Redirect::to("user_social_accounts?account=google");
            }
            unset($checkGoogleAccount);
            return Redirect::to("user_social_accounts?account=google");

        }
        else
        {
            $client->setRedirectUri(env('GOOGLE_CALLBACK_URL'));
            $client->addScope('email');
            $client->addScope('profile');
            $client->addScope('https://mail.google.com/');
            $url = $client->createAuthUrl();
            echo $url;
            return redirect((string)$url);
        }
    }

    public static function getGoogleData()
    {
        $i = 1;
        $result = "";
        $userObjectGoogleAccounts = new User_Google_Accounts();
        $userGoogleAccounts = $userObjectGoogleAccounts::getGoogleAccounts(Auth::User()->id);

        if ($userGoogleAccounts) {
            $result .= '<table class="table table-bordered">';
            $result .= '<thead>';
            $result .= '<tr>';
            $result .= '<th class="text-center">N</th>';
            $result .= '<th class="text-center">Account status</th> <!-- test correct select by user id -->';
            $result .= '<th class="text-center">Google id</th>';
            $result .= '<th class="text-center">Google user</th>';
            $result .= '<th class="text-center">Google access token</th>';
            $result .= '<th class="text-center">Token end of life</th>';
            //$result .= '<th class="text-center">Edit</th>';//Delete if no more need
            $result .= '<th class="text-center">Delete</th>';
            $result .= '</tr>';
            $result .= '</thead>';
            $result .= '<tbody>';
            foreach ($userGoogleAccounts as $user_google_account) {
                $result .= '<tr>';
                $result .= '<td class="fill-number-in-rows text-center">' . $i . '.</td>';
                $result .= '<td class="text-center">';
                if($user_google_account->authorization == "0"):
                    $result .= '<a href="'. route('api.user_google') . '" style="color: #fff">';
                    $result .= '<button type="button" class="btn btn-dunger">
                                            Get authorization';
                    $result .= '</button>';
                    $result .= '</a></td>';
                else:
                    $result .= '<button type="button" class="btn btn-success">
                                        Authorized';
                    $result .= '</button>';
                endif;

                $result .= '<td class="text-center">' . $user_google_account-> id_user_google. '</td>';
                $result .= '<td class="text-center">' . $user_google_account-> user_google_name. '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-info" id="show_google_token_secret_' . $user_google_account->id . '" onclick="show_google_secret_token(' . Auth::User()->id . ',' . $user_google_account->id . ',' . "'"  . $user_google_account->self_token . "'" . ')" data-dismiss="modal" title="show key">
                    SHOW KEY
                </button>';
                $result .= '</td>';
                $result .= '<td class="text-center">' . $user_google_account->date_end_of_life . '</td>';
                $result .= '<td class="text-center">';
                $result .= '<button type="button" class="btn btn-danger" id="del_google_account_' . $user_google_account->id . '" onclick="open_modal_window_delete_google_account(' . Auth::User()->id . ',' . $user_google_account->id . ',' . "'" . $user_google_account->self_token . "'" . ')" data-dismiss="modal" title="delete">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>';
                $result .= '</td>';
                $result .= '</tr>';
                $i++;
            }
            $result .= '</tbody>';
            $result .= '</table>';
            unset($userObjectGoogleAccounts);
            return $result;
        } else {
            $result = "<p>Sorry, you have now accounts to show. Please add new.</p>";
            unset($userObjectGoogleAccounts);
            return $result;
        }
    }

    public static function openModalWindowDeleteGoogleAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $result .= '<!-- Modal to delete google accounts -->';
        $result .= '<div class="modal-dialog" role="document">';
        $result .= '<div class="modal-content">';
        $result .= '<!-- Modal Header -->';
        $result .= '<div class="modal-header">';
        $result .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= '<h4 class="modal-title" id="add_user_google_accounts_label">Warning!</h4>';
        $result .= '</div>';
        $result .= '<!-- Modal Body -->';
        $result .= '<div class="modal-body">';
        $result .= '<!-- Modal Actions -->';
        $result .= '<p>Are you sure to delete your Google account?</p>';
        $result .= '</div>';
        $result .= '<div class="modal-footer">';
        $result .= '<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">';
        $result .= '<button type="button" class="btn btn-success"  data-dismiss="modal" onclick="delete_google_account( ' . $id_user . ', ' . $id . ',' . "'" . $self_token . "'" . ')">Yes</button>';
        $result .= '<button type="button" class="btn btn-danger"  data-dismiss="modal">No</button>';
        $result .= '<input type="hidden" name="_token" value="{{ Session::token() }}">';
        $result .= '</div>';
        $result .= '</div>';
        $result .= '</div>';

        return $result;
    }

    public static function postDeleteGoogleAccount(Request $request)
    {
        $result = "";
        $id_user = $request['user_id'];
        $id = $request['id'];
        $self_token = $request['self_token'];

        $UserGoogleAccounts = new User_Google_accounts();
        $UserGoogleAccounts::deleteGoogleAccount($id, $id_user, $self_token);
        $result = self::getGoogleData();

        unset($UserGoogleAccounts);
        return $result;
    }
}