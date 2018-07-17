<?php

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

class TwitterPlug implements PluginInterfase
{
    public function Run($data) {}

    public function addJob($data)
    {
        try {
            
            $Script = new User_scripts();
            $Script = $Script::getParameters($data['script_name']);
            $internal_extarnal = $Script[0]->external;//$script_r->external; //0; //Run internal or external script
            $script_name = $data['script_name'];
            $user_id = $data['user_id'];
            $visual_name = "";
            $run_type = $internal_extarnal;
            $shedule = trim($data['check_shedule']);//"RUNONCE_NOW";
            $status = "Ready";

            $script_runner = ["script_name" => $script_name, "user_id" => $user_id, "source_account1" => $data['user_account']['user_account_1'], "source_social_net1" => $data['social_network']['social_network_1'],
                "params" => $data['script_parameters']]; //JSON with params

            self::RunInternalScript($script_runner);
            
        } catch (Exception $e) {
            
        }
    }



    private function RunInternalScript($run_array)
    {
        try {
            
            $log = new AimeeLoggerRepository();
            $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"NAME-SOCNET");
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            
        } catch (Exception $e) {
            
        }


        try {
            
            switch($run_array['script_name'])
            {
                case "AutoRetweet":
                    if(trim($run_array['source_social_net1'])=="Twitter") {
                        //  echo "Retweet";
                        $user_id = trim($run_array['user_id']);
                        $source_acc = trim($run_array['source_account1']);
                        $param_json = $run_array['params'];
                        $param = json_decode($param_json);
                        self::scriptRetweet($user_id, $source_acc, $param->keywords);
                        $log->WriteLog($user_id,$source_acc,$param->keywords,"4","DONE_KEYWORD_RETWEET");
                    }
                    break;
                case "DeleteOldTweets":
                    if(trim($run_array['source_social_net1'])=="Twitter") {
                        $user_id = trim($run_array['user_id']);
                        $source_acc = trim($run_array['source_account1']);
                        $param_json = $run_array['params'];
                        $param = json_decode($param_json);
                        self::scriptDeleteOldPost($user_id, $source_acc, $param->date);
                        $log->WriteLog($user_id,$source_acc,$param->date,"4","DONE_KEYWORD_RETWEET");
                    }
                    break;
                default:
                    $log->WriteLog("1","2","3","4","NOT");
                    return "Aimee wait";
                    break;
            }
            
        } catch (Exception $e) {
            
        }
    }

    private function RunExternalScript($run_array)
    {

        try {
            
            $log = new AimeeLoggerRepository();
            $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"RUN_EXTERNAL");
            $cScript = new User_scripts();
            $cScript =  $cScript::getParameters($run_array['script_name']);
            $cS_inter = $cScript[0]->script_interpretator;
            $cS_fname = $cScript[0]->script_filename;
            $cS_in_data = "IN";
            $cS_out_data = "/tmp/".time().".png";
            $cS_type = $cScript[0]->script_class;
            $cS_param3_json = $run_array['params'];
            $run_line = $cS_inter." "."/var/scripts/".$cS_fname." ".$cS_out_data." ".$cS_in_data." "."'".$cS_param3_json."'".$cS_type;
            $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],$run_line);
            $cS_AfterAction = $cS_fname = $cScript[0]->script_class;
            shell_exec($run_line);
            if($cS_AfterAction=="BASIC_POST_OUT_MYSELF")
            {
                        $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],$run_array['source_account1']);
                        $sTweet = new TwitterRepository();
                        $sTweetKeys = $sTweet->GetUserKeys($run_array['user_id'],$run_array['source_account1']);
                        $log->WriteLog("1","2",$run_array['script_name'],"keys",$sTweetKeys['user_key']);
                        $upData = base64_encode(file_get_contents($cS_out_data));
                        $sTweet->sendMediaTweet($sTweetKeys['user_key'],$sTweetKeys['user_key_secret'],$upData,'GO_EXT_RUN');
            }
            
        } catch (Exception $e) {
            
        }

    }


    private function scriptRetweet($user_id,$twitter_account,$keywords)
    {

        try {
            
            $myTweet = new TwitterRepository();
            $user_keys = $myTweet->GetUserKeys($user_id,$twitter_account);
            $tweetQArraay = $myTweet->searchForTweets($keywords);
            $twa = json_decode($tweetQArraay);
            foreach($twa->statuses as $stat) {
                $myTweet->postReTweet($user_keys['user_key'], $user_keys['user_key_secret'], $stat->id,'');
            }
            
        } catch (Exception $e) {
            
        }

    }

    private function scriptDeleteOldPost($user_id,$twitter_account,$time) {

        try {
            
            $myTweet = new TwitterRepository();
            $user_keys = $myTweet->GetUserKeys($user_id,$twitter_account);
            $tweetQArraay = $myTweet->GetMyTwit($user_keys['user_key'], $user_keys['user_key_secret'], $twitter_account);
            $twa = json_decode($tweetQArraay);
            //var_dump($twa);
            foreach($twa as $stat) {
                var_dump($stat->id);
                if(strtotime($stat->created_at) > strtotime($time)) {
                 $f =   $myTweet->Destroy($user_keys['user_key'], $user_keys['user_key_secret'], $stat->id);
                 var_dump(json_decode($f));
                }
            }
            
        } catch (Exception $e) {
            
        }

    }


    public function Config($token,$script)
    {

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
            $result .= '<div class="panel-heading">Script parameters</div>';
            $result .= '<div class="panel-body" id="add_script_parameters">';
            $result .= '<p> Here parameters to your script. Enter please data.</p>';
            foreach ($scriptParameters as $key => $value) {
                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_' . $i . '" id="script_label_param_' . $i . '" class="col-md-4 actions-control-label text-right">' . $key . '</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-6">';
                $result .= '<input type="text" id="script_param_' . $i . '" class="form-control" name="script_param_' . $i . '" placeholder="Type here value please" value="' . $value . '" required>';
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

        } catch (Exception $e) {
            
        
        }

    }
}