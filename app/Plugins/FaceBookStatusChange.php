<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 13.02.2017
 * Time: 15:49
 */

namespace App\Plugins;
use App\PluginInterfase;
use App\Console\Commands\Twitter;
use Illuminate\Http\Request;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_scripts;
use App\Repositories\TwitterRepository;
use App\Repositories\FacebookRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AimeeLoggerRepository;
use Facebook;


class FaceBookStatusChange
{
    public static function Run($run_array) {

        try {
            
            $log = new AimeeLoggerRepository();
            // $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"NAME-SOCNET");
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_FACEBOOK_STATUS_CHANGE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            $param_json = $run_array['params'];
            $param = json_decode($param_json);
            $token = $run_array['user_tokens'];
            //  $fbr = new FaceBookRepository();

            Facebook::post('My Test',$token);
            // self::scriptDeleteOldPost($user_id, $source_acc, $param->date);
            // $log->WriteLog($user_id,$token,$param->date,"4","DONE_KEYWORD_RETWEET");

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_FACEBOOK_STATUS_CHANGE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {
            
            print 'Error: ';
            print $e->getMessage();
            print_r('<br>');
            $result .= '<center>';
            $result .= '<div class="panel-body">';
            $result .= '<div class="btn-group" data-toggle="buttons" id="BtnCenter">';

            /* Close Button */
            $result .= '<div class="panel-heading">Script parameters';
            $result .= '<button type="button" onclick="save_action_data_to_session();close_popup()" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $result .= '</div>';

            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="save_action_data_to_session();close_popup()">';
            $result .= '<input type="radio" name="options_shedule">Close';
            $result .= '</label>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</center>';
            print_r($result);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_IN_FACEBOOK_STATUS_CHANGE [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        }

    }
}