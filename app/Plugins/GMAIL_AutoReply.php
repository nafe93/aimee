<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 13.03.2017
 * Time: 15:26
 */

namespace App\Plugins;

use App\User_Google_accounts;
use Illuminate\Http\Request;
use App\User_scripts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\AimeeLoggerRepository;
use App\Repositories\GoogleRepository;

class GMAIL_AutoReply
{
    /**
     * [Run description]
     * @param [type] $run_array [description]
     */
    public static function Run($run_array) {     

        $err = false;
        $msgs = false;

        /**
         * Primary initiation of the script
         */
        try {

            $log = new AimeeLoggerRepository();
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_GMAIL_AUTO <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
            $param_json = $run_array['params'];
            $param = json_decode($param_json);
            $access_token = User_Google_accounts::getFullAccessToken($run_array['user_id'],$run_array['source_account1']);
            $refresh_token = User_Google_accounts::getFullRefreshToken($run_array['user_id'],$run_array['source_account1']);
            $client = new \Google_Client();
            $client->setAuthConfig(env('GOOGLE_JSON_DATA'));
            //Check
            $googRepo = new GoogleRepository();
            $new_token = $googRepo->RefreshIfExpire($run_array['user_id'],$run_array['source_account1']);
            $work_token= User_Google_accounts::getFullAccessToken($run_array['user_id'],$run_array['source_account1']);
            $AObj = json_decode( $work_token);
            $AToken = ['access_token' => $AObj->{'access_token'}, "expires_in" => $AObj->{'expires_in'}, 'token_type' => $AObj->{'access_token'}];
            $client->setAccessToken($AToken);
            $service = new \Google_Service_Gmail($client);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_GMAIL_AUTO_INIT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {

            print 'An error occurred in primary initiation of GMAIL_AutoReply script: ';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_GMAIL_AUTO_INIT [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            // exit;
            // throw $e;
            // return false;
            $err = $e;

        }



        /*----------GMAIL WORKING------------*/

        

        /**
         * Getting user params and list of messages by this params:
         */
        try {

            $work_repo = new GoogleRepository();     
            // Получили объявленные пользователем параметры:
            $user_params = $work_repo->parseUserParams($param->Parameters);
            // Получаем сообщения согласно параметрам из формы ($param):
            $msgs=$work_repo->listMessages($service,'me', $param);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_GMAIL_AUTO_GET_MESSAGES_AND_USER_PARAMS <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {

            print 'An error occurred while getting your params and finding messages: ';
            print $e->getMessage() . ':' . $e->getLine();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_GMAIL_AUTO_GET_MESSAGES_AND_USER_PARAMS [Error: " . $e->getMessage() . "]  <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            // throw $e;
            $err = $e;
            
        }


        try {
            
            if (!$msgs) {
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"SEARCH_NO_RESULTS_GMAIL_AUTO <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                // print 'No results found for your request now';
                throw new \Exception("No results found for your request now", 1);
                
            }
            
        } catch (\Exception $e) {

            print 'An error occurred when checking count of messages: ';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_GMAIL_AUTO_GET_MESSAGES_AND_USER_PARAMS [Error: " . $e->getMessage() . "]  <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            // throw $e;
            $err = $e;
            
        }

        // $go = $service->users_labels->get('me','INBOX'); //listUsersMessages('me',['maxResults'=> 2, 'labelIds'=> 'INBOX']);
        // var_dump($go);
        // $headers = '';
        // $i = 0;
        /**
         * Parsing each emails and put the values of variables to it
         */
        $oneExcept = false;
        $oneMsg = false;
        try {

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"EMAILS_PARSING_CYCLE_BEGINS_GMAIL_AUTO <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            

            foreach ($msgs as $msg)
            {

                // $cur_m = $work_repo->getMessage($service,'me',$msg->getId());
                $cur_m = $work_repo->messagesGetRequest($service,'me',$msg->getId());

                if ($cur_m instanceof \Exception) {
                    throw $cur_m;
                    return false;
                } else {

                    $mail_body = $cur_m['content_body_plain'];
                    $mail_vars = $work_repo->parseMail($mail_body);
                    $result_arr = $work_repo->parsedArrMerge($mail_vars, $user_params);         

                    $keys = array_keys($result_arr);
                    $values = array_values($result_arr);
                    $user_mail = str_replace($keys, $values, $param->Body);

                    $data = [
                        'From' => 'me',
                        'To' => $result_arr[ $user_params['email'] ],
                        'Subject' => $cur_m['subject'],
                        'Body' => $user_mail,
                    ];

                    $send = $work_repo->sendMessage($service, $data, $client);                    

                    // $oneExcept = false;   instanceof \Exception
                    // $oneMsg = false;      instanceof \Google_Service_Gmail_Message
                    if ($send instanceof \Exception) {
                        
                        $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ONE_EMAIL_WAS_NOT_SENT_IN_GMAIL_AUTO <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

                        $oneExcept = true;

                        throw $send;

                    } elseif($send instanceof \Google_Service_Gmail_Message) {

                        $oneMsg = $send->getMessage();
                        
                        $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ONE_EMAIL_PARSED_AND_SENT_IN_GMAIL_AUTO <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

                        print_r('<span style="font-size:20px; padding-top: 8px;" class="label label-info">One message sent: ' . $oneMsg . '</span>');

                        // $oneMsg = true; 
                    
                    } else {

                        trigger_error('Unexpected error');

                    }


                }
                
            }
             

            /*if ($oneExcept && $oneMsg) {
                
                $log->WriteLog($user_id, $source_acc, $run_array['script_name'], $run_array['source_account1'], "ERROR_GMAIL_AUTO_NOT_ALL_MESSAGES_WERE_SENT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                throw new \Exception('[Warning] Not all messages were sent', 1);

            } elseif(!$oneExcept && $oneMsg) {

                // print_r('All operations are done');
                unset($err);
                // Log will be at the FINALLY block

            } elseif(!$oneExcept && !$oneMsg) {

                print_r('+');
                $log->WriteLog($user_id, $source_acc, $run_array['script_name'], $run_array['source_account1'], "ERROR_GMAIL_AUTO_MESSAGES_WERE_NOT_SENT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

                throw new \Exception('[Error] Unexpected error. Messages were not sent', 1);

            } elseif($oneExcept && !$oneMsg) {

                print_r('+');
                $log->WriteLog($user_id, $source_acc, $run_array['script_name'], $run_array['source_account1'], "ERROR_GMAIL_AUTO_ALL_MESSAGES_RETURNS_ERROR <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

                throw new \Exception('[Error] All messages returns an error. No messages were sent', 1);

            }*/

            $log->WriteLog($user_id, $source_acc, $run_array['script_name'], $run_array['source_account1'], "FINISHED_GMAIL_AUTO <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_ONE_OR_MORE_EMAILS_WAS_NOT_SENT_GMAIL_AUTO [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            print_r('<br>');
            print 'An error occurred: ';
            print $e->getMessage();
            print_r('<br>');

            $err = $e;
            // throw $e;
            
        } finally {

            if ($err) {

                print_r('<br><span style="font-size:20px; padding-top: 8px;" class="label label-danger">Gmail script finished with errors: ' . $err->getMessage() . '</span>');
                print_r('<br>');
                
            } else {

                print_r('<br><span style="font-size:20px; padding-top: 8px;" class="label label-success">Gmail script succesfully finished. All operations are done</span>');
                print '<br>';

            } 
            
            exit;

        }
        

    }

    /**
     * [Conf description]
     * @param [type] $token  [description]
     * @param [type] $script [description]
     */
    public static function  Conf($token,$script){

        try {

            $result = "";
            $script_name = $script;
            $i = 0;

            $Script = new User_scripts();
            $Script =  $Script::getParameters($script_name);
            $scriptParameters= json_decode($Script[0]->script_parameters);
            $result .= '<div class="row">';
            $result .= '<div class="col-md-12" style="max-height: 600px; top:">';
            $result .= '<div class="panel panel-default">';

            /* Close Button */
            $result .= '<div class="panel-heading">Script parameters';
            $result .= '<button type="button" onclick="save_action_data_to_session();close_popup()" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $result .= '</div>';
            
            $result .= '<div class="panel-body" id="add_script_parameters">';
            $result .= '<p> Here parameters to your script. Enter please data.</p>';


                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_0" id="script_label_param_0" class="col-md-3 actions-control-label text-right">From</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-9">';
                $result .= '<input type="text" style="width: 100%" id="script_param_0" class="form-control" name="script_param_0" placeholder="user_email_address@gmail.com" value="' . $scriptParameters->From . '" required>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';

                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_1" id="script_label_param_1" class="col-md-3 actions-control-label text-right">Subject</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-9">';
                $result .= '<input type="text" style="width: 100%" id="script_param_1" class="form-control" name="script_param_1" placeholder="some words from mail subject" value="' . $scriptParameters->Subject . '" required>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';

                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_2" id="script_label_param_2" class="col-md-3 actions-control-label text-right">To</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-9">';
                $result .= '<input type="text" style="width: 100%" id="script_param_2" class="form-control" name="script_param_2" placeholder="your_email_address@gmail.com" value="' . $scriptParameters->To . '" required>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';

                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_3" id="script_label_param_3" class="col-md-3 actions-control-label text-right">Parameters</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-9">';
                $result .= '<textarea style="width: 100%; min-height: 50px;" id="script_param_3" class="form-control" name="script_param_3" placeholder="Variables for script">' . $scriptParameters->Parameters . '</textarea>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';

                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_4" id="script_label_param_4" class="col-md-3 actions-control-label text-right">Body</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-9">';
                $result .= '<textarea style="width: 100%; min-height: 100px;" id="script_param_4" class="form-control" name="script_param_4" placeholder="Message with defined variables">' . $scriptParameters->Body .  '</textarea>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';

            /*foreach ($scriptParameters as $key => $value) {
                $result .= '<div class="row">';
                $result .= '<div class="form-group">';
                $result .= '<label for="script_param_' . $i . '" id="script_label_param_' . $i . '" class="col-md-3 actions-control-label text-right">' . $key . '</label>';
                $result .= '<div class="col-md-9">';
                $result .= '<input type="text" id="script_param_' . $i . '" class="form-control" name="script_param_' . $i . '" placeholder="Type here value please" value="' . $value . '" required>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
                $i++;
            }*/

            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<div class="row">';
            $result .= '<div class="col-md-12">';
            $result .= '<div class="panel panel-default">';
            $result .= '<div class="panel-heading">Description</div>';
            $result .= '<div class="panel-body" >';
            $result .= '<p id="d">' . $Script[0]->script_info . '</p>';

            $result .= '<input type="hidden" id="value_script_target" value="' . $Script[0]->script_target . '">';
            $result .= '</div>';


            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';

            $result .= '<center>';
            $result .= '<div class="panel-body">';
            $result .= '<div class="btn-group" data-toggle="buttons" id="BtnCenter">';
            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="save_action_data_to_session();close_popup()">';
            $result .= '<input type="radio" name="options_shedule"> Save And Next';
            $result .= '</label>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</center>';

            session(['script_target' => $Script[0]->script_target]);
            unset($Script);
            return $result;
            
        } catch (\Exception $e) {
            
            /*print 'Error: ';
            print $e->getMessage();
            print_r('<br>');
            $result .= '<center>';
            $result .= '<div class="panel-body">';
            $result .= '<div class="btn-group" data-toggle="buttons" id="BtnCenter">';
            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="close_popup()">';
            $result .= '<input type="radio" name="options_shedule">Close';
            $result .= '</label>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</center>';
            print_r($result);*/
            
        }

        
    }

}