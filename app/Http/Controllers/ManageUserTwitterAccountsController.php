<?php
/**
 * Controller to add/delete and change users twitter accounts data in DB
 * User: alex
 * Date: 20.11.16
 * Time: 16:14
 */
    namespace App\Http\Controllers;

    use App\Http\Middleware\OAuth;
    use App\Repositories\AimeeRunnerRepository;
    use App\Repositories\TwitterRepository;
    use Illuminate\Support\Facades\Auth;
    use App\User_twitter_accounts;
    use Illuminate\Http\Request;
    use Abraham\TwitterOAuth\TwitterOAuth;

    class ManageUserTwitterAccountsController extends Controller
    {

        //Delete if no more need
//        public static function postAddTwitterAccount(Request $request)
//        {
//            $result = "";
//            $id_user = $request['id_user'];
//            $user_twitter_login = $request['user_twitter_login'];
//            $twitter_access_token = encrypt($request['twitter_access_token']);
//            $twitter_access_token_secret = encrypt($request['twitter_access_token_secret']);
//            $authorization = false; //Дописать коллбэк от твиттера
//
//
//            $UserTwitterAccounts = new User_twitter_accounts();
//
//            $UserTwitterAccounts::setMainVariables($id_user, $user_twitter_login, $twitter_access_token, $twitter_access_token_secret, $authorization);
//
//            $UserTwitterAccounts::addUserTwitterAccount();
//            $result = self::getTwitterData();
//
//            unset($UserTwitterAccounts);
//            return $result;
//        }

        public static function postShowTwitterSecretToken (Request $request)
        {
            $result = "";
            $id_user = $request['user_id'];
            $id = $request['id'];
            $self_token = $request['self_token'];

            $UserTwitterAccounts = new User_twitter_accounts();
            $result = $UserTwitterAccounts::showTwitterSecretToken($id, $id_user, $self_token);
            $result = $result[0]->twitter_access_token_secret;

            unset($UserTwitterAccounts);
            return $result;
        }
//          Delete if no more need
//         public static function postEditTwitterAccount(Request $request)
//         {
//             $result = "";
//             $id_user = $request['user_id'];
//             $id = $request['id'];
//             $self_token = $request['self_token'];
//             $user_twitter_login = $request['user_twitter_login'];
//             $twitter_access_token = encrypt($request['twitter_access_token']);
//             $twitter_access_token_secret = encrypt($request['twitter_access_token_secret']);
//             $authorization = false; //Дописать коллбэк от твиттера
//
//             $UserTwitterAccounts = new User_twitter_accounts();
//             $UserTwitterAccounts::editTwitterAccount($id, $id_user, $self_token, $user_twitter_login, $twitter_access_token, $twitter_access_token_secret, $authorization);
//             $result = self::getTwitterData();
//
//             unset($UserTwitterAccounts);
//             return $result;
//         }

        public static function postDeleteTwitterAccount(Request $request)
        {
            $result = "";
            $id_user = $request['user_id'];
            $id = $request['id'];
            $self_token = $request['self_token'];

            $UserTwitterAccounts = new User_twitter_accounts();
            $UserTwitterAccounts::deleteTwitterAccount($id, $id_user, $self_token);
            $result = self::getTwitterData();

            unset($UserTwitterAccounts);
            return $result;
        }

        public static function getTwitterData()
        {
            $i = 1;
            $result = "";
            $userObjectTwitterAccounts = new User_twitter_accounts();
            $userTwitterAccounts = $userObjectTwitterAccounts::getTwitterAccounts(Auth::User()->id);

            if ($userTwitterAccounts) {
                $result .= '<table class="table table-bordered">';
                $result .= '<thead>';
                $result .= '<tr>';
                $result .= '<th class="text-center">N</th>';
                $result .= '<th class="text-center">Account status</th> <!-- test correct select by user id -->';
                $result .= '<th class="text-center">Twitter login</th>';
                $result .= '<th class="text-center">Twitter access token</th>';
                $result .= '<th class="text-center">Twitter access token secret</th>';
                //$result .= '<th class="text-center">Edit</th>';//Delete if no more need
                $result .= '<th class="text-center">Delete</th>';
                $result .= '</tr>';
                $result .= '</thead>';
                $result .= '<tbody>';
                foreach ($userTwitterAccounts as $user_twitter_account) {
                    $result .= '<tr>';
                    $result .= '<td class="fill-number-in-rows text-center">' . $i . '.</td>';
                    $result .= '<td class="text-center">';
                        if($user_twitter_account->authorization == "0"):
                            $result .= '<a href="'. route('api.user_twitter') . '" style="color: #fff">';
                                $result .= '<button type="button" class="btn btn-dunger">
                                            Get authorization';
                                $result .= '</button>';
                            $result .= '</a></td>';
                                else:
                                $result .= '<button type="button" class="btn btn-success">
                                        Authorized';
                                $result .= '</button>';
                        endif;

                    $result .= '<td class="text-center">@' . $user_twitter_account-> user_twitter_login. '</td>';
                    $result .= '<td class="text-center">' . $user_twitter_account->twitter_access_token . '</td>';
                    $result .= '<td class="text-center">';
                    $result .= '<button type="button" class="btn btn-info" id="show_twitter_token_secret_' . $user_twitter_account->id . '" onclick="show_twitter_secret_token(' . Auth::User()->id . ',' . $user_twitter_account->id . ',' . "'"  . $user_twitter_account->self_token . "'" . ')" data-dismiss="modal" title="show key">
                    SHOW KEY
                </button>';
                    $result .= '</td>';
                    //$result .= '<td class="text-center">';
                   // $result .= '<button type="button" class="btn btn-warning" id="edit_twitter_account_' . $user_twitter_account->id . '" onclick="open_modal_window_edit_twitter_account(' . Auth::User()->id . ',' . $user_twitter_account->id . ',' . "'"  . $user_twitter_account->self_token . "'" . ')" data-dismiss="modal" title="edit">
                                //<i class="glyphicon glyphicon-pencil"></i>
                            //</button>';//$result .= '<th class="text-center">Edit</th>';//Delete if no more need
                   // $result .= '</td>';
                    $result .= '<td class="text-center">';
                    $result .= '<button type="button" class="btn btn-danger" id="del_twitter_account_' . $user_twitter_account->id . '" onclick="open_modal_window_delete_twitter_account(' . Auth::User()->id . ',' . $user_twitter_account->id . ',' . "'" . $user_twitter_account->self_token . "'" . ')" data-dismiss="modal" title="delete">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>';
                    $result .= '</td>';
                    $result .= '</tr>';
                    $i++;
                }
                $result .= '</tbody>';
                $result .= '</table>';
                unset($userObjectTwitterAccounts);
                return $result;
            } else {
                $result = "<p>Sorry, you have no accounts to show. Please add new.</p>";
                unset($userObjectTwitterAccounts);
                return $result;
            }
        }

        //delete if no more need
//        public static function openModalWindowEditTwitterAccount(Request $request)
//         {
//             $result = "";
//             $id_user = $request['user_id'];
//             $id = $request['id'];
//             $self_token = $request['self_token'];
//
//             $userObjectTwitterAccounts = new User_twitter_accounts();
//             $userTwitterAccounts = $userObjectTwitterAccounts::getTwitterRowAccount($id_user, $id, $self_token);
//             $userTwitterAccounts = $userTwitterAccounts[0];
//
//             $result .= '<!-- Modal to delete twitter accounts -->';
//                 $result .= '<div class="modal-dialog" role="document">';
//                     $result .= '<div class="modal-content">';
//                         $result .= '<!-- Modal Header -->';
//                         $result .= '<div class="modal-header">';
//                             $result .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
//                             $result .= '<h4 class="modal-title" id="add_user_twitter_accounts_label">Edit your account here</h4>';
//                         $result .= '</div>';
//                         $result .= '<!-- Modal Body -->';
//                         $result .= '<form class="form-horizontal" role="form">';
//                            $result .= '<div class="modal-body">';
//                                $result .= '<!-- Twitter login -->';
//                                $result .= '<div class="form-group">';
//                                    $result .= '<label for="user_twitter_login_new" class="col-md-4 control-label">Twitter login @</label>';
//                                    $result .= '<div class="col-md-6">';
//                                        $result .= '<input type="text" class="form-control" name="user_twitter_login_new" placeholder="Type your twitter login wihout @" value="' . $userTwitterAccounts->user_twitter_login . '" required>';
//                                    $result .= '</div>';
//                                $result .= '</div>';
//                                $result .= '<!-- Twitter access token -->';
//                                $result .= '<div class="form-group">';
//                                    $result .= '<label for="twitter_access_token_new" class="col-md-4 control-label">Twitter access token</label>';
//                                    $result .= '<div class="col-sm-6">';
//                                        $result .= '<input type="text" class="form-control" name="twitter_access_token_new" value="' . decrypt($userTwitterAccounts->twitter_access_token) . '" placeholder="Your twitter access token" required>';
//                                    $result .= '</div>';
//                                $result .= '</div>';
//                                $result .= '<!-- Twitter access token secret -->';
//                                $result .= '<div class="form-group">';
//                                    $result .= '<label for="twitter_access_token_secret_new" class="col-md-4 control-label">Twitter access token secret</label>';
//                                    $result .= '<div class="col-sm-6">';
//                                        $result .= '<input type="text" class="form-control" name="twitter_access_token_secret_new"  value="' . decrypt($userTwitterAccounts->twitter_access_token_secret) . '" placeholder="Your twitter access token secret" required>';
//                                    $result .= '</div>';
//                                $result .= '</div>';
//                            $result .= '</div>';
//                            $result .= '<!-- Modal Actions -->';
//                            $result .= '<div class="modal-footer">';
//                                $result .= '<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">';
//                                $result .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
//                                $result .= '<button type="button" class="btn btn-success" onclick="edit_twitter_account(' . $id_user . ', ' . $id . ',' . "'" . $self_token . "'" . ')">Save changes</button>';
//                                $result .= '<input type="hidden" name="_token" value="{{ Session::token() }}">';
//                            $result .= '</div>';
//                        $result .= '</form>';
//                     $result .= '</div>';
//                 $result .= '</div>';
//
//             unset($UserTwitterAccounts);
//             return $result;
//         }

        public static function openModalWindowDeleteTwitterAccount(Request $request)
        {
            $result = "";
            $id_user = $request['user_id'];
            $id = $request['id'];
            $self_token = $request['self_token'];

            $result .= '<!-- Modal to delete twitter accounts -->';
                        $result .= '<div class="modal-dialog" role="document">';
                            $result .= '<div class="modal-content">';
                                $result .= '<!-- Modal Header -->';
                                $result .= '<div class="modal-header">';
                                    $result .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                    $result .= '<h4 class="modal-title" id="add_user_twitter_accounts_label">Warning!</h4>';
                                $result .= '</div>';
                                $result .= '<!-- Modal Body -->';
                                $result .= '<div class="modal-body">';
                                    $result .= '<!-- Modal Actions -->';
                                    $result .= '<p>Are you sure to delete your twitter account?</p>';
                                $result .= '</div>';
                                $result .= '<div class="modal-footer">';
                                    $result .= '<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">';
                                    $result .= '<button type="button" class="btn btn-success"  data-dismiss="modal" onclick="delete_twitter_account( ' . $id_user . ', ' . $id . ',' . "'" . $self_token . "'" . ')">Yes</button>';
                                    $result .= '<button type="button" class="btn btn-danger"  data-dismiss="modal">No</button>';
                                    $result .= '<input type="hidden" name="_token" value="{{ Session::token() }}">';
                                $result .= '</div>';
                            $result .= '</div>';
                        $result .= '</div>';

             return $result;
        }

         public function loginWithTwitter(Request $request)
         {
             // get data from request
             $token  = $request->get('oauth_token');
             $verify = $request->get('oauth_verifier');

             // get twitter service
             $tw = \OAuth::consumer('Twitter');

             // check if code is valid

             // if code is provided get user data and sign in
             if ( ! is_null($token) && ! is_null($verify))
             {
                 // This was a callback request from twitter, get the token
                 $token = $tw->requestAccessToken($token, $verify);

                 // Send a request with it
                 $result = json_decode($tw->request('account/verify_credentials.json'), true);

                 //Add data in table user_twitter_accounts

                 $id_user = Auth::user()->id;
                 $user_twitter_login = $result['screen_name'];
                 $twitter_access_token = $token->getRequestToken();
                 $twitter_access_token_secret = $token->getRequestTokenSecret();
                 $authorization = true;

                 $UserTwitterAccounts = new User_twitter_accounts();
                 $checkTwitterAccount = $UserTwitterAccounts::checkTwitterAccount($user_twitter_login, $twitter_access_token, $twitter_access_token_secret);
//                 var_dump($checkTwitterAccount);
//                 die();
                 if ($checkTwitterAccount == true) {
                     $UserTwitterAccounts::setMainVariables($id_user, $user_twitter_login, $twitter_access_token, $twitter_access_token_secret, $authorization);
                     $UserTwitterAccounts::addUserTwitterAccount();
                 } else {
                     return redirect('user_social_accounts?account=twitter');
                 }
                     unset($UserTwitterAccounts);

                 return redirect('user_social_accounts?account=twitter');
             }
             // if not ask for permission first
             else
             {
                 // get request token
                 $reqToken = $tw->requestRequestToken();

                 // get Authorization Uri sending the request token
                 $url = $tw->getAuthorizationUri(['oauth_token' => $reqToken->getRequestToken()]);

                 // return to twitter login url
                 return redirect((string)$url);
             }
         }
         function postTweetFromUser(Request $request)
         {
            // echo $request->get('selAccTo');
             $tweeter_acc = $request->get('selAccTo');
             $text_ = $request->get('summer_note');
             $keys = \DB::table('user_twitter_accounts')->where('user_twitter_login',$tweeter_acc)->get();
             $key_t="";
             $key_s="";
             foreach($keys as $ukey)
             {
                 $key_t = $ukey->twitter_access_token;
                 $key_s = $ukey->twitter_access_token_secret;
             }
             $tmp_f_length = env('TMP_LENGTH');
             $tmp_f_path = env('TMP_S_PATH');
             $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
             $numChars = strlen($chars);
             $tmp_f_name = '';
             for ($i = 0; $i < $tmp_f_length; $i++) {
                 $tmp_f_name .= substr($chars, rand(1, $numChars) - 1, 1);
             }
             //  $output=shell_exec('Rscript /var/www/aimee/public/scr/RBert/bert1.r '.$tmp_f_path.$tmp_f_name);
             $path_i = $tmp_f_path.$tmp_f_name.'png';
             $aimee_run = new AimeeRunnerRepository();
     //        $aimee_run->RunFromShell(env('R_RUNNER'),env('R_TYPE'),'bert1.r ',$path_i);

             $myTweet = new TwitterRepository();

     //        $type_i = pathinfo($path_i, PATHINFO_EXTENSION);
     //        $data_i = file_get_contents($path_i);
     //        $media = base64_encode($data_i);
     //        $date_run = time();
     //        $status = 'RScript working'.date("Y-m-d-h-i-s",$date_run);
     //        $media1 = $myTweet->sendMediaTweet($key_t, $key_s, $media, $status);
     //        shell_exec('rm '.$path_i);

             $tweetQArraay = $myTweet->searchForTweets($text_);
             $twa = json_decode($tweetQArraay);
             foreach($twa->statuses as $stat) {
                 echo $stat->text;
                 echo '<BR/>';
                 echo $stat->user->screen_name;
                 echo '<BR/>';
                 echo $stat->id;
                 echo '<BR/> ----------<BR/>';
                $myTweet->postReTweet($key_t, $key_s, $stat->id,'');
             }

         //    echo $tweetQArraay;
                 echo 'Done';



         }
    }