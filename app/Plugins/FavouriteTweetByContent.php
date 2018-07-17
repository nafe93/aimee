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
use League\Flysystem\Exception;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Plugins\ChangeAvatar;



class FavouriteTweetByContent
{
    
    protected static $keywordsTooltip = "<strong>Keywords according to which search of tweets will 
        be run</strong><br>You can use at most 10 keywords written through a comma";

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
            // $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"NAME-SOCNET");
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            //  echo "Retweet";
            //  user_account1
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_LIKE_IF_TEXT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $param_json = $run_array['params'];
            $param = json_decode($param_json);
            $keywords = "";

            if (isset($param->keywords)) {
                $keywords = $param->keywords;
            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INIT_DONE_LIKE_IF_TEXT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
        
            /*$userAccount = User_twitter_accounts::getTwitterAccounts($user_id)[0];
            $settings = [
            	'oauth_access_token' => $userAccount->twitter_access_token,
    		    'oauth_access_token_secret' => $userAccount->twitter_access_token_secret,
    		    'consumer_key' => "vWSZuGJDWe9Rs37SYXAvm0nV3", 
    		    'consumer_secret' => "w7GfqZg5OESEpNr6bH2qmPSbCigRU1vYSzBr02kw7pPKoAeTrP"
            ];
            */
        
            self::scriptListLike($user_id, $source_acc, $keywords, $run_array);
            // ChangeAvatar::Run($run_array);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_LIKE_IF_TEXT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        } catch (\Exception $e) {

            $err = $e->getMessage();
            print 'An error occurred when finishing FavouriteTweetByContent script: ' . $err;
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_LIKE_IF_TEXT_INIT [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        } finally {

            if ($err) {
                echo '<h5>Favouriting finished with error(s): '. $err .'</h5>';
            } else {
                echo '<h5>Tweets with passed keywords were successfully favourited</h5>';
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
    private static function scriptListLike($user_id, $twitter_account, $keywords, $run_array)
    {
        $result = false;

        try {
        
            $myTweet = new TwitterRepository();
            $log = new AimeeLoggerRepository();
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'], "BEGINS_SCRIPT_LIST_LIKE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">"); 

            $keywords = array_map('trim', explode(',', $keywords));
            $user_keys = $myTweet->GetUserKeys($user_id,$twitter_account);
            
            $data = [];
            foreach ($keywords as $kword) {
                $data[$kword] = $myTweet->getAllTweetsByKeyword($kword, $twitter_account);
            }

            $twits = [];
            foreach ($data as $key => $value) {
                $twits[] = $value['data'];
            }
            $twits = array_reduce($twits, 'array_merge', array());

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'], "FAVORITING_BEGINS_IN_CYCLE_IN_SCRIPT_LIST_LIKE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            foreach($twits as $twit) {
                if ($result instanceof \Exception) {
                    $myTweet->favoriteTweetByKey($user_keys, $twit->id);
                } else {
                    $result = $myTweet->favoriteTweetByKey($user_keys, $twit->id);
                }
                // Can affect performance:
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'], "ONE_ITEM_FAVORITED_IN_SCRIPT_LIST_LIKE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'], "DONE_SCRIPT_LIST_LIKE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            if ($result instanceof \Exception) {
                throw new \Exception($result->getMessage(), 1);
                echo('<br>Not all popular tweets by passed keyword(s) was favourited.');
            }

        } catch (\Exception $e) {

            print 'An error occurred in FavouriteTweetByContent script:' . $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_SCRIPT_LIST_LIKE [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;
        }

        // $twits = $myTweet->listMembersTwitsByKeywords($keywords, $twitter_account, $list);
        
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
                $result .= '<input type="text" id="script_param_' . $i . '" class="form-control fav-by-content-input-'. $i .'" name="script_param_' . $i . '" placeholder="Type here value please" value="' . $value . '" required>';
                $result .= '<span class="aimee-tooltip fav-by-content-tooltip-'. $i .'">'. $tooltips[$i] .'</span>';
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