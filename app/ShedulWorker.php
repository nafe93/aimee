<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 15.02.17
 * Time: 12:23
 */

$id         = $_GET['id'];
$USER       = 'aimee';
$PASSWORD   = 'secret';
$DB         = 'aimee';
$HOST       = 'localhost';

$sql = "SELECT * FROM user_jobs_strategy WHERE id_task='". $id . "'";

$dbConnect = mysql_connect($HOST, $USER, $PASSWORD) or die(mysql_error());

mysql_select_db($DB);

$result = mysql_query($sql) or die(mysql_error());

$h = 0;
$m = 0;
$infinetely = false;
$count = 0;

while ($row = mysql_fetch_assoc($result)) {
    $h = $row['shedule_script_hours'];
    $m = $row['shedule_script_minutes'];
    $count = $row['script_total_repeat'];
    $infinetely = $count > 0 ? false : true;
}

$timout = $h * 120 + $m * 60;

while ($count > 0 && !$infinetely) {

    $context  = stream_context_create($opts);
    file_get_contents('http://localhost/post/'.$id, false, null);

    $count--;
    sleep($timout);
}