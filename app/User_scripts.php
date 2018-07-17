<?php

namespace App;

use App\Repositories\AimeeLoggerRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User_scripts extends Model
{
    public static function getScriptsData()
    {
        return DB::table('user_scripts')
            ->select('*')
            ->get();
    }

    public static function getScriptsDat($network_name)
    {
        return DB::table('user_scripts')
            ->select('*')
            ->where('script_class', 'like','%'.$network_name.'%')
            ->get();
    }


    public static function getParametrData()
    {
        return DB::table('social_network')
            ->select('*')
            ->get();
    }

    public static function getParameters($script_name)
    {
        return DB::table('user_scripts')
            ->select('*')
            ->where('script_name', '=', $script_name)
            ->get();
    }

    public static function saveUserScript($user_id,
                                          $user_tokens,
                                          $script_name,
                                          $sheduler_parameters,
                                          $script_target,
                                          $script_parameters)
    {
        return DB::table('saved_user_scripts')->insert([
            ['user_id'              => $user_id,
                'user_tokens'           => $user_tokens,
                'script_name'           => $script_name,
                'sheduler_parameters'   => $sheduler_parameters,
                'script_target'         => $script_target,
                'script_parameters'     => $script_parameters]
        ]);
    }

    public static function saveUserScriptStrategy($data)
    {
        $user_id                = $data['user_id'];
        $social_network         = json_encode($data['social_network']);
        $user_account           = json_encode($data['user_account']);
        $script_name            = $data['script_name'];
        $script_parameters      = $data['script_parameters'];
        $user_tokens            = json_encode($data['user_tokens']);
        $user_message           = $data['user_message'];
        $check_shedule          = $data['check_shedule'];
        $time_shedule           = $data['time_shedule'];
        $shedule_script_hours   = $data['shedule_script_hours'];
        $shedule_script_minutes = $data['shedule_script_minutes'];
        $script_total_repeat    = $data['script_total_repeat'];
        $source_network         = json_encode($data['source_network']);
        $source_account         = json_encode($data['source_account']);
        $create_date            = $data['script_tcreated_time'];
        $target_account         = json_encode($data['target_accaunt']);

        return DB::table('user_jobs_strategy')->insert([
            ['user_id'                  => $user_id,
                'social_network'            => $social_network,
                'user_account'              => $user_account,
                'script_name'               => $script_name,
                'script_parameters'         => $script_parameters,
                'user_tokens'               => $user_tokens,
                'user_message'              => $user_message,
                'check_shedule'             => $check_shedule,
                'time_shedule'              => $time_shedule,
                'shedule_script_hours'      => $shedule_script_hours,
                'shedule_script_minutes'    => $shedule_script_minutes,
                'script_total_repeat'       => $script_total_repeat,
                'source_network'            => $source_network,
                'source_account'            => $source_account,
                'target_accaunt'            => $target_account,
                'create_date'               => $create_date]
        ]);

    }

    public static function saveTaskId($id)
    {
        return DB::table('ReadyToRun')->insert([
            ['task_id' => $id, 'status' => 'run']
        ]);

    }


    public static function savePid($id, $pid)
    {
        return DB::table('ActiveProcesses')->insert([
            ['id_task' => $id,
                'id_process' => $pid]
        ]);

    }

    public static function getPid($id)
    {
        return DB::table('ActiveProcesses')
            ->select('*')
            ->where('id_task', '=', $id)
            ->get();
    }

    public static function getScriptStrategy($id)
    {
        return DB::table('user_jobs_strategy')
            ->select('*')
            ->where('id_task', '=', $id)
            ->get();
    }

    public static function getStatusJob($id)
    {
        return DB::table('ReadyToRun')
            ->select('*')
            ->where('task_id', '=', $id)
            ->get();
    }

    public static function updatedJob($id, $status)
    {
        return DB::table('ReadyToRun')
            ->where('task_id', $id)
            ->update(['status' => $status]);
    }

    public static function saveUserScriptStrateg($data, $id_task)
    {
        
        $user_id                = $data['user_id'];
        $social_network         = json_encode($data['social_network']);
        $user_account           = json_encode($data['user_account']);
        $script_name            = $data['script_name'];
        $script_parameters      = $data['script_parameters'];
        $user_tokens            = json_encode($data['user_tokens']);
        $user_message           = $data['user_message'];
        $check_shedule          = $data['check_shedule'];
        $time_shedule           = $data['time_shedule'];
        $shedule_script_hours   = $data['shedule_script_hours'];
        $shedule_script_minutes = $data['shedule_script_minutes'];
        $script_total_repeat    = $data['script_total_repeat'];
        $source_network         = json_encode($data['source_network']);
        $source_account         = json_encode($data['source_account']);
        $create_date            = $data['script_tcreated_time'];
        $target_account         = json_encode($data['target_accaunt']);
        self::saveTaskId($id_task);
        // self::savePid($id_task, $pid);
        return DB::table('user_jobs_strategy')->insert([
            ['user_id'                  => $user_id,
                'social_network'            => $social_network,
                'user_account'              => $user_account,
                'script_name'               => $script_name,
                'script_parameters'         => $script_parameters,
                'user_tokens'               => $user_tokens,
                'user_message'              => $user_message,
                'check_shedule'             => $check_shedule,
                'time_shedule'              => $time_shedule,
                'shedule_script_hours'      => $shedule_script_hours,
                'shedule_script_minutes'    => $shedule_script_minutes,
                'script_total_repeat'       => $script_total_repeat,
                'source_network'            => $source_network,
                'source_account'            => $source_account,
                'target_accaunt'            => $target_account,
                'id_task'                   => $id_task,
                'create_date'               => $create_date]
        ]);

    }

    /**
     * @todo        30.03.2017      Added ['script_name', '<>', 'Sync']
     */
    public static function getUserScriptData($id)
    {
        return DB::table('user_jobs_strategy')
            ->select('*')
            ->where([['user_id', '=', $id], ['script_name', '<>', 'Sync']])
            ->get();
    }

    public static function deleteUserScriptData($id, $user_id)
    {
        return DB::table('user_jobs_strategy')
            ->where('id', '=', $id)
            ->where('user_id', '=', $user_id)
            ->delete();
    }

    public static function KillTaskAndClear($id)
    {
        $log_ = new AimeeLoggerRepository();
        $proc_id = DB::table('ActiveProcess')->select('*')->where('task_id','=',$id)->get();
        $log_->WriteLog("1","2","CLOSE","",$proc_id[0]->pid);
        DB::table('ActiveProcess')->where('task_id', '=', $id)->delete();
        shell_exec("kill ".$proc_id[0]->pid);
        $log_ = new AimeeLoggerRepository();
        $log_->WriteLog("1","2","CLOSE3","","NAME-SOCNET");

    }

    public static function getTaskStatus($task_id)
    {
        //    $go1 = new AimeeLoggerRepository();\
        //    $go1->WriteLog('0','0','0',$task_id,'0');\
        return DB::table('ReadyToRun')
            ->select('status')
            ->where('task_id','=',$task_id)
            ->get();
        //  $go1->WriteLog('1','0','0',var_dump($result),'0');
        //  return $result;
    }

    public static function GetRssChenal($id){
        return DB::table('RssChenals')
            ->select('*')
            ->where('id','=',$id)
            ->get();
    }

    public static function  GetAllRssChenal() {
        return DB::table('RssChenals')
            ->select('*')
            ->get();
    }
}
