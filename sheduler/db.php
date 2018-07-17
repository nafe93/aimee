<?php

// For Aimee:
// $servername = "localhost";
// $username = "root";
// $password = "aimee_prog10";
// $dbname = "aimee";

// For localhost:
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "aimee";


$write_log = function($process_id,$message) use ($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO aimee_logger (process_id, message, updated_at,user_id,source,technical_info)
    VALUES ('$process_id','$message',NOW(),'','','')";

    if ($conn->query($sql) === TRUE) {
        echo "Writing logs: New record created successfully";
    } else {
        echo "Writing logs: Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
};

/**
 * Main function for sheduler's first start
 * @var [type]
 */
$get_start_time = function($task_id) use ($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        $err = $conn->connect_error;
        $conn->close();
        die("Connection failed: " . $err);
    }
    $sql = "SELECT time_shedule FROM user_jobs_strategy WHERE id_task = '".$task_id."'";
    $st_time=$conn->query($sql,MYSQLI_USE_RESULT);
    $info = $st_time->fetch_object();
    $st_date = new DateTime($info->time_shedule);
    $u_st_date = $st_date -> getTimestamp();
    $cur_date = new DateTime();
    $u_cur_date=$cur_date->getTimestamp();
    mysqli_free_result($st_time);

    $sql2 = "SELECT shedule_script_hours, shedule_script_minutes 
                FROM user_jobs_strategy 
                WHERE id_task = '".$task_id."'";
    $sh_time =  $st_time=$conn->query($sql2,MYSQLI_USE_RESULT);
    $round_time = $sh_time->fetch_object();
    $roun_h = $round_time->shedule_script_hours * 60 *60;
    $round_m = $round_time->shedule_script_minutes * 60;
    $round_sum = $roun_h + $round_m;    
    mysqli_free_result($sh_time);

    if($u_st_date > $u_cur_date)
    {
        $conn->close();
        // return difference between two timestamps:
        return abs($u_cur_date-$u_st_date);
    }
    else
    {
        // check variable for zero value:
        if (!$round_sum) {
            $round_sum = 1;
        }
        // get diff btwn two tmstmps, get modulo of this and $round_sum, return it
        $over_time = abs($u_cur_date-$u_st_date);
        $near_step = $round_sum-($over_time % $round_sum);
        $conn->close();
        return $near_step;
    }
};

/**
 * Function for sheduler's sleep period
 * @var [type]
 */
$get_round_time = function($task_id) use ($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        $err = $conn->connect_error;
        $conn->close();
        die("Connection failed: " . $err);
    }

    $sql2 = "SELECT shedule_script_hours,shedule_script_minutes FROM user_jobs_strategy WHERE id_task = '".$task_id."'";
    $sh_time =  $st_time=$conn->query($sql2,MYSQLI_USE_RESULT);
    $round_time = $sh_time->fetch_object();
    $roun_h = $round_time->shedule_script_hours * 60 *60;
    $round_m = $round_time->shedule_script_minutes * 60;
    $round_sum = $roun_h + $round_m;
    if (!$round_sum) {
        $round_sum = 1;
    }
    mysqli_free_result($sh_time);
    echo "\nround_sum = ".$round_sum."\n";
    $conn->close();
    return $round_sum;
};

$get_total_repeat = function ($task_id) use ($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        $err = $conn->connect_error;
        $conn->close();
        die("Connection failed: " . $err);
    }

    $sql = "SELECT script_total_repeat FROM user_jobs_strategy WHERE id_task = '".$task_id."'";
    $result = $conn->query($sql,MYSQLI_USE_RESULT);
    $object = $result->fetch_object();
    $total_repeat = (int) $object->script_total_repeat;
    if ($total_repeat < 0) {
        $total_repeat = 0;
    }
    mysqli_free_result($result);
    $conn->close();
    return $total_repeat;
};

$decrement_total_repeat = function ($task_id) use ($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "UPDATE user_jobs_strategy 
                SET script_total_repeat = script_total_repeat - 1
                WHERE id_task = '$task_id' AND script_total_repeat > 0";

    if ($conn->query($sql) === TRUE) {
        echo "\r\nscript_total_repeat decremented successfully\r\n";
        $conn->close();
    } else {
        $errMsg = $conn->error;
        echo "Error: " . $sql;
        $conn->close();
        die('Script exit because of decrementing error: '.$errMsg."\r\n");
    }
};

    //$write_log(100,"GO","2016-10-10");

?>
