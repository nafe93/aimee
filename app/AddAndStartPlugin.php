<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 13.01.17
 * Time: 9:33
 */

namespace App;

use App\Http\Requests\Request;
use App\Plugins\TwitterPlug;
use App\Plugins\AutoRetweet;
use App\Plugins\DeleteOldTweets;
use App\Plugins\RetweetFromListByHashtags;
use App\Plugins\RetweetFromListByKeywords;
use App\Plugins\AllPopularFromListRetweeter;
use App\Plugins\FaceBookStatusChange;
use App\Plugins\FavouriteTweetByContent;
use App\Plugins\RSSRepost;
use App\Plugins\InstagramRandomPost;
use App\Plugins\GMAIL_AutoReply;
use App\Plugins\Sync;

include 'UsingFile.php';

class AddAndStartPlugin
{
    protected $ArrPlug;
    protected $ArrAjaxPlug = array();


    static public function Config($token,$script)
    {
        $result = "";
        $script_name = $script;
        $i = 0;

        switch (trim( $script_name)) {
            case "AutoRetweet":
                return AutoRetweet::Conf($token,$script);
                break;
            case "DeleteOldTweets":
                return DeleteOldTweets::Conf($token,$script);
                break;
            case "RetweetFromListByHashtags":
                return RetweetFromListByHashtags::Conf($token,$script);
                break;
            case "RetweetFromListByKeywords":
                return RetweetFromListByKeywords::Conf($token,$script);
                break;
            case "AllPopularFromListRetweeter":
                return AllPopularFromListRetweeter::Conf($token,$script);
                break;
            case "FavouriteTweetByContent":
                return FavouriteTweetByContent::Conf($token,$script);
                break;
            case "RSS Repost":
                return RSSRepost::Conf($token,$script);
                break;
            case "Instagram random post":
                return InstagramRandomPost::Conf($token,$script);
                break;
            case "GMAIL Auto reply":
                return GMAIL_AutoReply::Conf($token,$script);
                break;
            case "Sync":
                return Sync::Conf($token,$script);
                break;
        }
/*
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
            $result .= '<div class="row">';
            $result .= '<div class="form-group">';
            $result .= '<label for="script_param_' . $i . '" id="script_label_param_' . $i . '" class="col-md-4 control-label text-right">' . $key . '</label>';
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
        $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="close_popup()">';
        $result .= '<input type="radio" name="options_shedule"> Save And Next';
        $result .= '</label>';
        $result .= '</div>';
        $result .= '</div>';
        $result .= '</center>';
        $result .= '<br />';


        session(['script_target' => $Script[0]->script_target]);
        unset($Script);
        return $result;*/
    }

    public function NewPlugin(PluginInterfase $plag, $namePlag) {
        $this->ArrPlug[$namePlag] = $plag;

        return $this;
    }

    public function AddAjaxForPlagin($rout,$nameRout){
        $this->ArrAjaxPlug[$nameRout] = $rout;

        return $this;
    }

    public static function StartPlugin($data) {

        
        array_walk_recursive($data, 'trim');
        
        $Script = new User_scripts();
        $Script = $Script::getParameters($data['script_name']);
        $internal_extarnal = $Script[0]->external; //$script_r->external; //0; //Run internal or external script
        $script_name = $data['script_name'];
        $user_id = $data['user_id'];
        $visual_name = "";
        $run_type = $internal_extarnal;
        $shedule = trim($data['check_shedule']);//"RUNONCE_NOW";
        $status = "Ready";

        $script_runner = [

            "script_name" => $script_name, 
            "user_id" => $user_id, 
            "source_account1" => $data['user_account']['user_account_1'], 
            "all_user_accounts" => $data['user_account'], 
            "script_total_repeat" => $data['script_total_repeat'], 
            "source_social_net1" => $data['social_network']['social_network_1'],
            "all_source_social_networks" => $data['social_network'],
            "shedule_script_hours" => $data['shedule_script_hours'],
            "shedule_script_minutes" => $data['shedule_script_minutes'],  
            "params" => $data['script_parameters'],
            "user_tokens" => $data['user_tokens'],
            "user_message" => $data['user_message'],
            "check_shedule" => $data['check_shedule'],
            "target_accaunt" => $data['target_accaunt'],
            "time_shedule" => $data['time_shedule'],
            "source_network" => $data['source_network'],
            "source_account" => $data['source_account'],
            "script_tcreated_time" => $data['script_tcreated_time'],

        ]; //JSON with params
        
        /*
            $result = array();
            $result['user_id'] = $user_id;
            $result['user_account'] = $user_account_arr;
            $result['shedule_script_hours'] = $request['shedule_script_hours'];
            $result['shedule_script_minutes'] = $request['shedule_script_minutes'];
            $result['script_total_repeat'] = $request['script_total_repeat'];
            $result['target_accaunt'] = $user_target_account_arr;

            $result['social_network'] = '{"social_network_1":"synchronization"}';
            $result['social_network'] = ['social_network_1' => 'synchronization'];
            $result['script_name'] = 'Sync';
            $result['script_parameters'] = '{}';
            $result['user_tokens'] = $user_tokens;
            $result['user_message'] = '';
            $result['check_shedule'] = trim($request['check_shedule']) or 'on';
            $result['time_shedule'] = date('d.m.Y h:i', time());; //$request['time_shedule'];
            $result['source_network'] = '{"source_network_1":"synchronization"}'; //$source_network_arr;
            $result['source_account'] = '{"source_account_1":"synchronization"}'; //$source_account_arr;
            $result['script_tcreated_time'] = date('Y-m-d H:i:s');
         */

        array_walk_recursive($script_runner, 'trim'); 

        switch ($script_runner['script_name']) {
            case "AutoRetweet":
                if (trim($script_runner['source_social_net1']) == "Twitter") {
                    AutoRetweet::Run($script_runner);
                }
                break;
            case "DeleteOldTweets":
                if (trim($script_runner['source_social_net1']) == "Twitter") {
                    DeleteOldTweets::Run($script_runner);
                }
                break;
            case "RSS Repost":
              //  if (trim($script_runner['source_social_net1']) == "Facebook") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                   RSSRepost::Run($script_runner,trim($script_runner['source_social_net1']));
                    // DeleteOldTweets::Run($script_runner);
            //    }
                break;
            case "RetweetFromListByHashtags":
                if (trim($script_runner['source_social_net1']) == "Twitter") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                    RetweetFromListByHashtags::Run($script_runner);
                    // DeleteOldTweets::Run($script_runner);
                }
                break;
            case "RetweetFromListByKeywords":
                if (trim($script_runner['source_social_net1']) == "Twitter") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                    RetweetFromListByKeywords::Run($script_runner);
                    // DeleteOldTweets::Run($script_runner);
                }
                break;
            case "AllPopularFromListRetweeter":
                if (trim($script_runner['source_social_net1']) == "Twitter") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                    AllPopularFromListRetweeter::Run($script_runner);
                    // DeleteOldTweets::Run($script_runner);
                }
                break;
            case "FavouriteTweetByContent":
                if (trim($script_runner['source_social_net1']) == "Twitter") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                    FavouriteTweetByContent::Run($script_runner);
                    // DeleteOldTweets::Run($script_runner);
                }
                break;
            case "Instagram random post":
                if (trim($script_runner['source_social_net1']) == "Instagram") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                    InstagramRandomPost::Run($script_runner);
                }
                break;
            case "GMAIL Auto reply":
                if (trim($script_runner['source_social_net1']) == "Google") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                    GMAIL_AutoReply::Run($script_runner);
                }
                break;
            case "Sync":    
                // maks_2: if dont work
                // if (trim($script_runner['source_social_net1']) == "Sync") {
                    $script_runner['user_tokens'] = $data['user_tokens'];
                    Sync::Run($script_runner);
                // }
                break;

            default:
                return "Aimee wait";
                break;
        }
    }

    public static function StartConfig($token,$script){
        return self::Config($token,$script);
    }
    public function GetRout($nameRount){
        return $this->ArrAjaxPlug[$nameRount];
    }
}