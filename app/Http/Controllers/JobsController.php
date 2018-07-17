<?php
/**
 * Controller to add/delete and change users jobs data in DB
 * User: fishouk.alexey
 * Date: 29.11.2016
 * Time: 14:33
 */
namespace App\Http\Controllers;


use App\Console\Commands\Twitter;
use App\User_LinkedIn_Accounts;
use App\User_Instagram_Accounts;
use App\User_Google_accounts;
use Illuminate\Http\Request;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_scripts;
use App\Repositories\TwitterRepository;
use App\Repositories\AimeeLoggerRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Plugins\TwitterPlug;
use App\AddAndStartPlugin;
use App\ShedulStart\ShedulEntry;

class JobsController extends Controller
{
    public function __construct()
    {

    }
    public static function postShowAccountsUnderSocialNetwork(Request $request)
    {
        $result = "";
        $user_id = $request['user_id'];
        $social_network = $request['social_account'];

        switch ($social_network){
            case "Twitter":
                $Accounts = new User_twitter_accounts();
                $Accounts =  $Accounts::getTwitterAccounts($user_id);
                foreach($Accounts as $Account) {
                    $result .= '<option >';
                    $result .= $Account->user_twitter_login;
                    $result .= '</option >';
                }
                break;
            case "Facebook":
                $Accounts = new User_facebook_accounts();
                $Accounts =  $Accounts::getFacebookAccounts($user_id);
                foreach($Accounts as $Account) {
                    $result .= '<option >';
                    $result .= $Account->user_facebook_login;
                    $result .= '</option >';
                }
                break;
            case "LinkedIn":
                $Accounts = new User_LinkedIn_Accounts();
                $Accounts =  $Accounts::getLinkedInAccounts($user_id);
                foreach($Accounts as $Account) {
                    $result .= '<option >';
                    $result .= $Account->user_linkedin_name;
                    $result .= '</option >';
                }
                break;
            case "Instagram":
                $Accounts = new User_Instagram_Accounts();
                $Accounts =  $Accounts::getInstagramAccounts($user_id);
                foreach($Accounts as $Account) {
                    $result .= '<option >';
                    $result .= $Account->user_instagram_name;
                    $result .= '</option >';
                }
                break;
            case "Google":
                $Accounts = new User_Google_Accounts();
                $Accounts =  $Accounts::getGoogleAccounts($user_id);
                foreach($Accounts as $Account) {
                    $result .= '<option >';
                    $result .= $Account->user_google_name;
                    $result .= '</option >';
                }
                break;
        }

        unset($Accounts);
        return $result;
    }

    public static function modalToAddScriptsParameters(Request $request)
    {
        $result = "";
        $script_name = $request['script_name'];
        $i=0;

        $Script = new User_scripts();
        $Script =  $Script::getParameters($script_name);

        $scriptParameters= json_decode($Script[0]->script_parameters);

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

        session(['script_target' => $Script[0]->script_target]);

        unset($Script);
        return $result;
    }

    public static function GetScriptDescriptionAndParameters(Request $request)
    {
        return AddAndStartPlugin::StartConfig($request['_token'],$request['script_name']);
    }

    public static function GetFullDescription(Request $request) {
        $script_name = trim($request['script_name']);

        $Script = new User_scripts();
        $Script =  $Script::getParameters($script_name);

        $result = "";
        $result .= '<div class="close_window" onclick="close_popup()">x</div>';
        $result .= '<p id="full_description">'. $Script[0]->full_description .'</p>';

        session(['script_target' => $Script[0]->script_target]);
        unset($Script);

        return $result;
    }

    public static function saveUserScript(Request $request)
    {
        $user_id = $request['user_id'];
        $social_network_arr = array();
        $user_account_arr = array();
        $source_network_arr = array();
        $source_account_arr = array();
        $user_target_account_arr = array();
        $i=1;

        if (@$request['social_network']) {
        
            $social_network = array_diff($request['social_network'], array(''));
            $i=1;
            foreach ($social_network as $account) {
                $social_network_arr['social_network_' . $i] = $account;
                $sn = $account;
                $i++;
            }

        }

        if (@$request['user_account']) {
            
            $user_account = array_diff($request['user_account'], array(''));
            $i=1;
            foreach ($user_account as $account) {
                $user_account_arr['user_account_' . $i] = $account;
                $i++;
            }

        }

        if (@$request['target_accaunt']) {
            
            $user_target_account = array_diff($request['target_accaunt'], array(''));
            $i=1;
            foreach ($user_target_account as $account) {
                $user_target_account_arr['user_target_account_' . $i] = $account;
                $i++;
            }

        }

        if (@$request['source_network']) {
            
            $source_network = array_diff($request['source_network'], array(''));
            $i=1;
            foreach ($source_network as $account) {
                $source_network_arr['source_network_' . $i] = $account;
                $i++;
            }

        }

        if (@$request['source_accounts']) {
            
            $source_account = array_diff($request['source_accounts'], array(''));
            $i=1;
            foreach ($source_account as $account) {
                $source_account_arr['source_account_' . $i] = $account;
                $i++;
            }

        }

        unset($i);

        $script_name = $request['script_name'];
        $keys = $request['script_name_parameters'];
        $values = $request['script_parameters'];
        $sheduler_parameters = "";
        $script_parameters = array_combine($keys, $values);
        $user_tokens = array();

        $Script = new User_scripts();
        $script_params =  $Script::getParameters($script_name);
        $script_target = $script_params[0]->script_target;

        switch ($request['social_network'][0]){
            case "Twitter":
                $Accounts = new User_twitter_accounts();
                $Accounts = $Accounts::getTwitterAccounts($user_id);
                $user_tokens[1] = $Accounts[0]->twitter_access_token;
                $user_tokens[2] = $Accounts[0]->twitter_access_token_secret;
                break;
            case "Facebook":
                $Accounts = new User_facebook_accounts();
                $Accounts = $Accounts::getFacebookAccounts($user_id);
                $user_tokens[1] = $Accounts[0]->facebook_access_token;
                $log = new AimeeLoggerRepository();
                $log->WriteLog("1","2",'FB1',$user_tokens[1],"RUN_EXTERNAL");
                break;
        }

        $script_parameters = json_encode($script_parameters);

        $result = array();
        $result['user_id'] = $user_id;
        $result['social_network'] = $social_network_arr;
        $result['user_account'] = $user_account_arr;
        $result['script_name'] = $script_name;
        $result['script_parameters'] = $script_parameters;
        $result['user_tokens'] = $user_tokens;
        $result['user_message'] = $request['user_message'];
        $result['check_shedule'] = trim($request['check_shedule']);
        $result['time_shedule'] = $request['time_shedule'];
        $result['shedule_script_hours'] = $request['shedule_script_hours'];
        $result['shedule_script_minutes'] = $request['shedule_script_minutes'];
        $result['script_total_repeat'] = $request['script_total_repeat'];
        $result['source_network'] = $source_network_arr;
        $result['source_account'] = $source_account_arr;
        $result['script_tcreated_time'] = date('Y-m-d H:i:s');
        $result['target_accaunt'] = $user_target_account_arr;

        AddAndStartPlugin::StartPlugin($result);
        self::saveUserScriptStrategy($result);

        unset($Accounts);
        unset($Script);
        // maks_2: uncomment for debug output:
        // print_r($result);
    }


    public static function scriptRetweet($user_id,$twitter_account,$keywords)
    {

        $myTweet = new TwitterRepository();
        $user_keys = $myTweet->GetUserKeys($user_id,$twitter_account);
        $tweetQArraay = $myTweet->searchForTweets($keywords);
        $twa = json_decode($tweetQArraay);
        foreach($twa->statuses as $stat) {
            $myTweet->postReTweet($user_keys['user_key'], $user_keys['user_key_secret'], $stat->id,'');
        }
    }

    public static function saveUserScriptStrategy($data)
    {

        $id = md5(date('l dS of F Y h:i:s A'));
        $postdata = http_build_query(
            array(
                'id' => $id,
            )
        );


        $opts = array('http' =>
            array(
                'method'  => 'GET',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

       // $pid = "";
        $userStrategyScripts = new User_scripts();
        $userStrategyScripts::saveUserScriptStrateg($data,$id);

        unset($userStrategyScripts);
    }

    public static function getStrategyListData()
    {
        $i                   = 1;
        $page                = 1;
        $tableStart          = '';
        $tableBody           = [];
        $tableEnd            = '';
        $arr                 = [];
        $userStrategyScripts = new User_scripts();
        $userStrategyScripts = $userStrategyScripts::getUserScriptData(Auth::User()->id);
        /*$arr = [];
        $i = 0;
        foreach($array as $key => $value){
            $arr[$i] = $value;
            $arr[$i] .= $value;
            $arr[$i] .= $value;
            ++$i;
        }*/

        if ($userStrategyScripts) {
            $tableStart .= '<table class="table table-bordered">';
            $tableStart .= '<thead>';
            $tableStart .= '<tr>';
            $tableStart .= '<th class="text-center">N</th>';
            $tableStart .= '<th class="text-center">Social network</th> <!-- test correct select by user id -->';
            $tableStart .= '<th class="text-center">User account</th>';
            $tableStart .= '<th class="text-center">Script name</th>';
            // $result .= '<th class="text-center">Keywords</th>';
            // $result .= '<th class="text-center">User message</th>';
            $tableStart .= '<th class="text-center">Check schedule</th>';
            $tableStart .= '<th class="text-center">First start</th>';
            $tableStart .= '<th class="text-center">Schedule script hours</th>';
            $tableStart .= '<th class="text-center">Schedule script minutes</th>';
            $tableStart .= '<th class="text-center">Repeat counter</th>';
            // $result .= '<th class="text-center">Source network</th>';
            // $result .= '<th class="text-center">Source account</th>';
            // $tableStart .= '<th class="text-center">Create date</th>';
            $tableStart .= '<th class="text-center">Delete</th>';
            $tableStart .= '<th class="text-center">Status</th>';
            $tableStart .= '</tr>';
            $tableStart .= '</thead>';
            $tableStart .= '<tbody>';
            foreach ($userStrategyScripts as $user_strategy_script) {
                $tableBody[$page][$i] = '<tr>';
                $tableBody[$page][$i] .= '<td class="fill-number-in-rows text-center">' . $i . '.</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . json_decode($user_strategy_script->social_network)->social_network_1 . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . json_decode($user_strategy_script->user_account)->user_account_1 . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . $user_strategy_script->script_name . '</td>';
              //  $result .= '<td class="text-center">' . json_decode( $user_strategy_script->script_parameters)->keywords. '</td>';
                // $result .= '<td class="text-center">' . $user_strategy_script->user_message . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . $user_strategy_script->check_shedule . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . $user_strategy_script->time_shedule . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . $user_strategy_script->shedule_script_hours . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . $user_strategy_script->shedule_script_minutes . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">' . $user_strategy_script->script_total_repeat . '</td>';
                //$result .= '<td class="text-center">' . json_decode($user_strategy_script->source_network)->source_network_1 . '</td>';
                // $result .= '<td class="text-center">' .json_decode($user_strategy_script->social_network)->social_network_1 . '</td>';
                // $result .= '<td class="text-center">' . json_decode($user_strategy_script->source_account)->source_account_1 . '</td>';
                // $tableBody[$page][$i] .= '<td class="text-center">' . $user_strategy_script->create_date . '</td>';
                $tableBody[$page][$i] .= '<td class="text-center">';
                $tableBody[$page][$i] .= '<button type="button" class="btn btn-danger" onclick="delete_user_strategy_script(' . $user_strategy_script->id . ')" data-dismiss="modal" title="delete">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>';
                $tableBody[$page][$i] .= '</td>';


               // $taskStat = new User_scripts();
                $taskStat = User_scripts::getTaskStatus($user_strategy_script->id_task);
                switch ($taskStat[0]->status)
                {
                    case 'run':
                         $tableBody[$page][$i] .= '<td class="text-center satrtJob" > <a href= "#" id="'. $user_strategy_script->id_task. '" class="button_stop" onclick="StopJob(\'' . $user_strategy_script->id_task . '\')">Stop</a> </td>';
                         break;
                    case 'runned':
                         $tableBody[$page][$i] .= '<td class="text-center satrtJob" > <a href= "#" id="'. $user_strategy_script->id_task. '" class="button_stop" onclick="StopJob(\'' . $user_strategy_script->id_task . '\')">Stop</a> </td>';
                         break;
                    case 'paused':
                         $tableBody[$page][$i] .= '<td class="text-center stopJob"> <a href= "#" id="'. $user_strategy_script->id_task. '" class="button_stop" onclick="RenewalJob(\'' . $user_strategy_script->id_task . '\')">Renewal</a> </td>';
                         break;
                    case 'finished':
                        $tableBody[$page][$i] .= '<td class="text-center" > <a href= "#" id="'. $user_strategy_script->id_task. '" class="button_stop">finished</a> </td>';
                        break;
                    default:
                        $tableBody[$page][$i] .= '<td class="text-center" > <a href= "#" id="'. $user_strategy_script->id_task. '" class="button_stop" onclick="RenewalJob(\'' . $user_strategy_script->id_task . '\')">Default</a> </td>';
                }

                $tableBody[$page][$i] .= '</tr>';
                ++$i;
                if ($i > 0 && $i % 11 == 0) {
                    ++$page;
                }
            }

            $tableEnd .= '</tbody>';
            $tableEnd .= '</table>';

            $tableEnd .= '<nav class="actions-table-nav">';
                $tableEnd .= '<button id="actions-table-prev" type="button" class="btn btn-default 
                    actions-table-nav-button glyphicon glyphicon-chevron-left"></button>';
                $tableEnd .= '<span id="action-table-page-num" class="actions-table-counter">1</span>';
                $tableEnd .= '<button id="actions-table-next" type="button" class="btn btn-default 
                    actions-table-nav-button glyphicon glyphicon-chevron-right"></button>';
            $tableEnd .= '</nav>';
            $tableEnd .= '<p class="for-content-box"></p>';

            unset($userStrategyScripts);
            // return $result;
            return response()->json([
                'tableStart' => $tableStart, 'tableBody' => $tableBody, 'tableEnd' => $tableEnd,
                ]);
        } else {
            $tableStart = "<p class=\"text-center\">Sorry, you have no actions to show. 
                Please add new.</p>";
            unset($userStrategyScripts);
            return response()->json([
                'tableStart' => $tableStart, 'tableBody' => false, 'tableEnd' => false,
                ]);
        }
    }

    public  static function StopJob(Request $request) {
        $Status = new User_scripts();
        $Status = $Status::getStatusJob($request['id']);

        if(!isset($Status[0]->status)) return 0;

        if(trim($Status[0]->status) == "runned") {
            $update = new User_scripts();
            $update::updatedJob($request['id'], "paused");
            $update::KillTaskAndClear($request['id']);
            return 1;
        }
        elseif (trim($Status[0]->status) == "run") {
            $update = new User_scripts();
            $update::updatedJob($request['id'], "paused");
            $update::KillTaskAndClear($request['id']);
            return 1;
        }
        else return 0;
    }

    public static function RenewalJob(Request $request) {
        $Status = new User_scripts();
        $Status = $Status::getStatusJob($request['id']);

        if(!isset($Status[0]->status)) return 0;

        if(trim($Status[0]->status) == "paused") {
            $update = new User_scripts();
            $update::updatedJob($request['id'], "run");
            return 1;
        } else return 0;
    }

    public static function deleteUserScriptData(Request $request)
    {
        $id = $request['id'];
        $user_id = $request['user_id'];
        $userStrategyScripts = new User_scripts();

        $userStrategyScripts::deleteUserScriptData($id, $user_id);

        unset($userStrategyScripts);
        return self::getStrategyListData();
    }


    public static function getTodayEvent() {
        $i = 1;
        $result = "";
        $userStrategyScripts = new User_scripts();
        $userStrategyScripts = $userStrategyScripts::getUserScriptData(Auth::User()->id);

        foreach ($userStrategyScripts as $user_strategy_script) {
            $result .= '<div  class="cbm_wrap">';
            $result .= '<h1>Today Event</h1>';
            $result .= '<p id="strategyToday">' . $i . '.</p>';
            $result .= '<p id="strategyToday">'. $user_strategy_script->social_network  .'</p>';
            $result .= '<p id="strategyToday">'. $user_strategy_script->scripn_name  .'</p>';
            $result .= '</div>';
            $i++;
        }
        unset($userStrategyScripts);
        return $result;
    }
    public static function LoadScript(Request $requesrt) {
        $networkName = $requesrt['network_name'];
        $userScripts = new \App\User_scripts();
        $userScripts =  $userScripts::getScriptsDat($networkName);

        $result = '';
        foreach ($userScripts as $userScript)
            $result .= '<option>'. $userScript->script_name  .'</option>';


        return $result;
    }


}
