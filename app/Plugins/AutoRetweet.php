<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 01.02.17
 * Time: 15:55
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
 * @todo : Works correctly
 */
class AutoRetweet
{

    protected static $keywordTooltip = "<strong>Keywords</strong><br>Enter keywords separated by 
        commas. You can use maximum 10 keywords per script";

    public static function Run($run_array) {
    
        $err = false;

        try {
            

            $log = new AimeeLoggerRepository();
            // $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"NAME-SOCNET");
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_AUTO_REPOST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $param_json = $run_array['params'];
            $param = json_decode($param_json);
            
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INITIATED_AUTO_REPOST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            self::scriptRetweet($user_id, $source_acc, $param->keywords, $run_array);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_AUTO_REPOST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");


        } catch (\Exception $e) {

            echo 'An error occurred when finishing autoretweeting: ';
            echo $e->getMessage();
            echo '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_IN_AUTO_REPOST [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $err = $e->getMessage();

        } finally {

            if ($err) {
                echo '<h5>AutoRetweeting finished with error: <span class="text-danger">'. $err .'</span></h5>';
                if (stristr($err, "expired token")) {
                    echo "<p>Please reinstall your <a href=\"/user_social_accounts?account=twitter\">Twitter account</a></p>";
                }
            } else {
                echo '<h5>AutoRetweeting completed <span class="text-success">successfully</span></h5>';
            }
        }

    }

    private static function scriptRetweet($user_id,$twitter_account,$keywords, $run_array)
    {

        try {
            $log = new AimeeLoggerRepository();
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $myTweet = new TwitterRepository();
            $user_keys = $myTweet->GetUserKeys($user_id,$twitter_account);
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"GET_USER_KEYS_EXECUTED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $key_array = array_slice( array_map('trim', explode(',', $keywords)), 0, 10);
            /*foreach ($key_array as $key => $value) {
                $key_array[$key] = preg_replace("/[^A-Za-z0-9 ]/", '', $value);
            }*/

            $ex = false;
            $i = 0;
            foreach ($key_array as $value) {
                
                $tweetQArraay = $myTweet->searchForTweets($value);
                    $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"SEARCH_FOR_TWEETS_EXECUTED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                $twa = json_decode($tweetQArraay);

                if (empty( $twa->statuses )) {
                    print_r("Statuses with keyword \"$value\" were <span class='text-danger'>not found</span><br>");
                    $ex = new \Exception("Some statuses were not found");
                    continue;
                } else {
                    print_r("Statuses with keyword \"$value\" <span class='text-success'>successfully found</span>. Retweeting...<br>");
                }

                foreach($twa->statuses as $stat) {
                    $ex = $myTweet->postReTweet($user_keys['user_key'], $user_keys['user_key_secret'], $stat->id, $stat->text);
                    if (is_bool($ex) && $ex == true) {
                        echo '<span>One tweet <span class="text-success">succesfully retweeted</span></span><br>';
                        ++$i;
                    }
                    $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"POST_RETWEET_EXECUTED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                }
                
            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_SCRIPT_RETWEET <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            echo '<br><span>Total number of tweets: <span class="text-success"><b>', $i, '</b></span></span><br>';

            if ($ex instanceof \Exception) throw $ex;
            
        } catch (\Exception $e) {

            echo 'An error occurred when retweeting: ';
            echo $e->getMessage();
            echo '<br>';
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
            $result .= '<button type="button" onclick="save_action_data_to_session();close_popup();" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $result .= '</div>';

            $result .= '<div class="panel-body" id="add_script_parameters">';
            $result .= '<p> Here parameters to your script. Enter please data.</p>';
            foreach ($scriptParameters as $key => $value) {
                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group clearfix">';
                    $result .= '<div class="col-md-4">';
                    $result .= '<label for="script_param_' . $i . '" id="script_label_param_' . $i . '" class="col-md-4 actions-control-label text-right">' . $key . '</label>';
                    $result .= '</div>';
                    $result .= '<div class="col-md-6">';
                    $result .= '<input type="text" id="script_param_' . $i . '" class="form-control autoretweet-keyword" name="script_param_' . $i . '" placeholder="Type here value please" value="' . $value . '" required>';
                    $result .= '<span class="aimee-tooltip autoretweet-keyword-tooltip">'. self::$keywordTooltip .'</span>';
                    $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
                $i++;
            }
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
            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="save_action_data_to_session();close_popup();">';
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

            echo 'Error: ';
            echo $e->getMessage();
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

