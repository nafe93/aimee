<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 27.01.17
 * Time: 11:57
 */

use \App\User_scripts;
use \App\AddAndStartPlugin;

echo  "start";
$Script = new User_scripts();
$id = $_GET['id'];
$Script =  $Script::getScriptStrategy($id);

$result = array();
$result['user_id'] = $Script->user_id;
$result['social_network'] = json_decode($Script[0]->social_network);
$result['user_account'] = json_decode($Script[0]->user_account);
$result['script_name'] = $Script[0]->script_name;
$result['script_parameters'] = json_decode($Script[0]->script_parameters);
$result['user_tokens'] = json_decode($Script[0]->user_tokens);
$result['user_message'] = $Script[0]->user_message;
$result['check_shedule'] = trim($Script[0]->check_shedule);
$result['time_shedule'] = $Script[0]->time_shedule;
$result['shedule_script_hours'] = $Script[0]->shedule_script_hours;
$result['shedule_script_minutes'] = $Script[0]->shedule_script_minutes;
$result['script_total_repeat'] = $Script[0]->script_total_repeat;
$result['source_network'] = json_decode($Script[0]->source_network);
$result['source_account'] = json_decode($Script[0]->source_account);
$result['script_tcreated_time'] = $Script[0]->script_tcreated_time;
$result['target_accaunt'] = json_decode($Script[0]->target_accaunt);
echo "OK";

AddAndStartPlugin::StartPlugin($result);



?>