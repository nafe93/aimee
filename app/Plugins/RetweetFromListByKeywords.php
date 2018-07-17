<?php
/**
 * User: Maks Glebov
 * Date: 21.02.17
 * 
 * DIR: /var/www/aimee/app/Plugins
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



class RetweetFromListByKeywords
{

    protected static $keywordsTooltip = "<strong>Keywords according to which search of tweets will 
        be run</strong><br>You can use at most 10 keywords written through a comma";

    protected static $listTooltip = "<strong>Twitter list name</strong><br>Search will be run on 
        one of the lists which are available in your account in Twitter. Write the name of one 
        list";

	/**
	 * [Run description]
	 * @param [type] $run_array [description]
	 */
    public static function Run($run_array) {

        $err = false;

        try {
            
            $log = new AimeeLoggerRepository();
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_LIST_RETWEETER_BY_KEYWORD <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            // $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"START_LIST_RETWEETER");
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
                        //  echo "Retweet";
                        //  user_account1
            
            $param_json = $run_array['params'];
            $param = json_decode($param_json);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INIT_DONE_LIST_RETWEETER_BY_KEYWORD <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            self::scriptListRetweet($user_id, $source_acc, $param->keywords, $param->list, $run_array);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_LIST_RETWEETER_BY_KEYWORD <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        } catch (\Exception $e) {

            $err = $e->getMessage();
            print 'An error occurred when finishing RetweetFromListByKeyword script: ';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_LIST_RETWEETER_BY_KEYWORD [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        } finally {

            if ($err) {
                print '<h5>Retweeting finished with error(s): <span class="text-danger">'. $err .'</span></h5>';
            } else {
                print '<h5>Tweets from list by passed keywords were <span class="text-success">successfully retweeted</span></h5>';
            }

        }

    }

    /**
     * [scriptListRetweet description]
     * @param  [type] $user_id         [description]
     * @param  [type] $twitter_account [description]
     * @param  [type] $keywords        [description]
     * @param  [type] $list            [description]
     * @return [type]                  [description]
     */
    private static function scriptListRetweet($user_id, $twitter_account, $keywords, $list, $run_array)
    {
        $result = true;
        $ex = false;
        $found_err = "";
        $not_found = "";
        $found = "";

        try {

            $log = new AimeeLoggerRepository();
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_SCRIPT_LIST_RETWEET <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $key_array = array_slice( array_map('trim', explode(',', $keywords)), 0, 10);

            $myTweet = new TwitterRepository();
            $user_keys = $myTweet->GetUserKeys($user_id,$twitter_account);
            $result = $myTweet->listMembersTweetsByKeywords($key_array, $twitter_account, $list);

            $twits = $result['tweets'];
            $is_found = $result['is_found'];

            $not_found = "";
            $found = "";
            foreach ($is_found as $key => $value) {
                if (!$value) {
                    $not_found .= $key . ", "; 
                } else {
                    $found .= $key . ", ";
                }
            }

            $not_found = rtrim(trim($not_found), ' ,');
            $found = rtrim(trim($found), ' ,');

            /*dump($result);
            echo "Not: ";
            dump($not_found);
            echo "Found: ";
            dump($found);
            dd('stop');*/

            if (!empty($not_found) && !empty($found)) {
                // throw new \Exception("Tweets with keywords <b>". $not_found ."</b> <span class=\"text-danger\">were not found</span>. <b>Other keywords ($found)</b> successfully <b><span class=\"text-success\">found and retweeted</span></b>", 1);
                $found_err = "Tweets with keywords <b>". $not_found ."</b> <span class=\"text-danger\">were not found</span>. Other keywords <b>$found</b> successfully <b><span class=\"text-success\">found</span></b>";
            } elseif (!empty($not_found) && empty($found)) {
                $found_err = "Tweets with all passed keywords <b>". $not_found ."</b> <span class=\"text-danger\">were not found</span>";
                throw new \Exception("Tweets with all passed keywords (<b>". $not_found ."</b>) <span class=\"text-danger\">were not found</span>", 1);
            }

            if ($found_err) {
                echo $found_err . "\r\n";
            }
            
            foreach($twits as $twit) {
                $result = $myTweet->postReTweet($user_keys['user_key'], $user_keys['user_key_secret'], $twit->id_str, $twit->text);
                if ($result instanceof \Exception)
                    $ex = $result;
            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_SCRIPT_LIST_RETWEET <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            if ($ex instanceof \Exception)
                throw $ex;
            
        } catch (\Exception $e) {

            /*echo "Not: ";
            dump($not_found);
            echo "Found: ";
            dump($found);
            dd('stop');*/
            
            print 'An error occurred when retweeting: ';
            print $e->getMessage();
            print '<br>';
            echo $found_err;
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_SCRIPT_LIST_RETWEET [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;

        }


    }

    /**
     * [Conf description]
     * @param [type] $token  [description]
     * @param [type] $script [description]
     */
    public static function Conf($token,$script){

        try {
            
            $tooltips = [
                self::$keywordsTooltip,
                self::$listTooltip,
            ];

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
            foreach ($scriptParameters as $key => $value) {
                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_' . $i . '" id="script_label_param_' . $i . '" class="col-md-4 actions-control-label text-right">' . $key . '</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-6">';
                $result .= '<input type="text" id="script_param_' . $i . '" class="form-control retweet-by-keywords-'. $i .'" name="script_param_' . $i . '" placeholder="Type here value please" value="' . $value . '" required>';
                $result .= '<span class="aimee-tooltip retweet-from-list-tooltip-'. $i .'">'. $tooltips[$i] .'</span>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
                ++$i;
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








 ?>