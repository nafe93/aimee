<?php
    /**
    * Created by PhpStorm.
    * User: zaitsev
    * Date: 15.02.2017
    * Time: 16:56
    */

    namespace App\Http\Controllers;

    use App\Console\Commands\Twitter;
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

    class SheduleRecieverController extends Controller
    {
        public function __construct()
        {

        }

        public static function Start()
        {
            $Script = new User_scripts();
            //$id = '00ce6679a35bcd0f1166b2f4ca65f657';
            $id=$_GET['id'];
            $Script =  User_Scripts::getScriptStrategy($id);
            //  echo $Script[0]->user_id;
            $result = array();
            $result['user_id'] = $Script[0]->user_id;
            $result['social_network'] = $Script[0]->social_network;
            $result['user_account'] = (array)json_decode($Script[0]->user_account);
            $result['script_name'] = $Script[0]->script_name;
            $result['script_parameters'] = $Script[0]->script_parameters;
            $result['user_tokens'] = $Script[0]->user_tokens;
            $result['source_network'] = $Script[0]->source_network;
            $result['user_message'] = $Script[0]->user_message;
            $result['check_shedule'] = trim($Script[0]->check_shedule);
            $result['time_shedule'] = $Script[0]->time_shedule;
            $result['shedule_script_hours'] = $Script[0]->shedule_script_hours;
            $result['shedule_script_minutes'] = $Script[0]->shedule_script_minutes;
            $result['script_total_repeat'] = $Script[0]->script_total_repeat;
            $result['social_network'] = (array)json_decode($Script[0]->social_network);
            $result['source_account'] = $Script[0]->source_account;
            $result['script_tcreated_time'] = $Script[0]->create_date;
            $result['target_accaunt'] = $Script[0]->target_accaunt;
            // var_dump($Script);
            // dd($result);
            echo "OK";
            echo  "start";
            AddAndStartPlugin::StartPlugin($result);
            // return view('welcome');
            echo "Runned";
        }
    }