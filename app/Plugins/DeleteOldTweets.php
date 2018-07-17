<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 01.02.17
 * Time: 16:02
 */

namespace App\Plugins;

use App\PluginInterfase;
use App\Console\Commands\Twitter;
use Illuminate\Http\Request;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_scripts;
use App\Repositories\TwitterRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AimeeLoggerRepository;



/**
 * @todo : maks_2, check this script with various dates. Now it works correctly
 */
class DeleteOldTweets
{
    protected static $dateTooltip = "<strong>Date to which is requires to delete tweets</strong><br>
        Use the following format: <i>mm/dd/yyyy</i>";

    public static function Run($run_array) {

        $err = false;

        try {
            
            $log = new AimeeLoggerRepository();
            // $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"NAME-SOCNET");
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_DELETE_POST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $param_json = $run_array['params'];
            $param = json_decode($param_json);
            self::scriptDeleteOldPost($user_id, $source_acc, $param->date, $run_array);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_DELETE_POST_INIT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {

            $err = $e->getMessage();
            print 'An error occurred when finishing delete script: ';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_IN_DELETE_POST [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } finally {

            if ($err) {
                print '<h5>Deleting finished with error: <span class="text-danger">'. $err .'</span></h5>';
            } else {
                print '<h5>Tweets were <span class="text-success">successfully deleted</span> by passed date</h5>';
            }

        }

        
    }

    private static function scriptDeleteOldPost($user_id,$twitter_account,$time, $run_array) {

        try {
            $log = new AimeeLoggerRepository();
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            
            $myTweet = new TwitterRepository();
            $user_keys = $myTweet->GetUserKeys($user_id,$twitter_account);
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"GET_USER_KEYS_EXECUTED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
            $tNum = 0;
            do {

                try {

                    $twa = json_decode( $myTweet->GetMyTwit($user_keys['user_key'], $user_keys['user_key_secret'], $twitter_account) );
                        $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"GET_MY_TWIT_EXECUTED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                    
                    if (empty($twa) && $tNum == 0) {
                        print_r("No tweets were found<br>");
                    } elseif (empty($twa)) {
                        print_r("No more tweets by this date were found<br>");
                    }


                    foreach ($twa as $status) {
                        
                        // Old:
                        /*$userDate = new \DateTime();
                        $userDate->setTimestamp( strtotime($time) );
                        $userDateString = $userDate->format('d.m.Y');

                        $statusDate = new \DateTime();
                        $statusDate->setTimestamp( strtotime($status->created_at) );
                        $statusDateString = $statusDate->format('d.m.Y');*/

                        /*print_r('$userDateString: ' . $userDateString . '<br>');
                        print_r('$statusDateString: ' . $statusDateString . '<br>');
                        var_dump( strtotime($userDateString) >= strtotime($statusDateString) );*/
                        
                        // USA date format: mm/dd/yyyy or n/j/Y in PHP:

                        if (@$status->created_at) {
                            $userDateString = date('n/j/Y', strtotime($time));  
                            // $statusDateString = date('n/j/Y', strtotime($status->created_at));
                            $statusDateArray = date_parse_from_format("D M d H:i:s e Y", $status->created_at);
                            $statusDateString = date('n/j/Y', strtotime($statusDateArray['month'] . '/' . $statusDateArray['day'] . '/' . $statusDateArray['year']) );
                        } else {
                            echo "<h3 class=\"text-info\">Status havn't date</h3>";
                            $userDateString = '0';
                            $statusDateString = '1';
                        }


                        if( strtotime($userDateString) >= strtotime($statusDateString) ) {
                            $f = $myTweet->Destroy($user_keys['user_key'], $user_keys['user_key_secret'], $status->id);
                                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DESTROY_EXECUTED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                            // print_r(json_decode($f));
                            if ($f === null) {
                                print('Tweet with id ' . $status->id . ' was <span class="text-success">successfully deleted</span><br>');
                                $tNum++;
                            } elseif ($f === false) {
                                print('Tweet with id ' . $status->id . ' was <span class="text-danger">NOT deleted</span><br>');
                            }
                        }

                        // unset($createdDate, $userDate);
                    }

                    if ($tNum < 1) {
                        throw new \Exception("No tweets by this period were found<br>", 1);
                        break 1;
                    }

                } catch (\Exception $e) {
                 
                    print 'An error occurred when deleting tweet: ' . $e->getMessage() . '<br>';
                    $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_IN_SCRIPT_DELETE_POST [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                    throw $e;
                }

            } while ($twa);

            ($tNum == 1) ? print $tNum . ' tweet was deleted<br>' : print '<br>' . $tNum . ' tweets were deleted<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_SCRIPT_DELETE_POST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {

            print 'An error occurred when deleting tweets: ';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_IN_SCRIPT_DELETE_POST [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;
        }


    }


    public static function  Conf($token,$script){

        try {
            
            $result = "";
            $script_name = $script;
            $i = 0;

            $Script = new User_scripts();
            $Script =  $Script::getParameters($script_name);
            $scriptParameters= json_decode($Script[0]->script_parameters);
            $result .= '<div class="row">';
            $result .= '<div class="col-md-12">';
            $result .= '<div class="panel panel-default">';
            
            /* Close Button */
            $result .= '<div class="panel-heading">Script parameters';
            $result .= '<button type="button" onclick="save_action_data_to_session();close_popup()" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $result .= '</div>';

            $result .= '<div class="panel-body" id="add_script_parameters">';
            $result .= '<p> Here parameters to your script. Enter please data.</p>';
            /*foreach ($scriptParameters as $key => $value) {
                $result .= '<div class="row">';
                $result .= '<div class="form-group">';
                $result .= '<label for="script_param_' . $i . '" id="script_label_param_' . $i . '" class="col-md-4 actions-control-label text-right">' . $key . '</label>';
                $result .= '<div class="col-md-6">';
                $result .= '<input type="text" id="script_param_' . $i . '" class="form-control" name="script_param_' . $i . '" placeholder="Type here value please" value="' . $value . '" required>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
                $i++;
            }*/

                $result .= '<div class="row">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                    $result .= '<label for="script_param_0" id="script_label_param_0" class="col-md-4 actions-control-label text-right">date</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-6">';
                $result .= '<input type="text" id="script_param_0" class="form-control 
                    delete-old-tweets" name="script_param_0" placeholder="Type here value please" 
                    value="' . date("n/j/Y") . '" required>';
                $result .= '<span class="aimee-tooltip deleteOldTweets-date-tooltip">';
                    $result .= self::$dateTooltip; 
                $result .= '</span>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
                $i++;

            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<br />';
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
            $result .= '<br />';

            $result .= '<center>';
            $result .= '<div class="panel-body">';
            $result .= '<div class="btn-group" data-toggle="buttons" id="BtnCenter">';
            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="save_action_data_to_session();close_popup()">';
            $result .= '<input type="radio" name="options_shedule"> Save And Next';
            $result .= '</label>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</center>';
            $result .= '<br />';


            session(['script_target' => $Script[0]->script_target]);
            unset($Script);
            return $result;
            
        } catch (\Exception $e) {
            
            print 'Error: ';
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
            print_r($result);
            
        }

        
    }


}