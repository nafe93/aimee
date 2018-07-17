<?php 
/**
 * Sheduler
 *
 * @author Глебов Максим <rainy_dream@mail.ru>
 * @version 1.0.0
 * @package Views
 */

$defaultSleepTime = 30; // sec

echo "connecting to db...\n";
// $aimee_db = new PDO("mysql:host=localhost;dbname=aimee;", 'root', 'aimee_prog10');
$aimee_db = new PDO("mysql:host=localhost;dbname=aimee;", 'root', 'root');
echo "OK\n";

echo "getting run and runned tasks...\n";
$tasks = $aimee_db->query("SELECT * FROM ReadyToRun WHERE status='run' OR status='runned' ")->fetchAll(PDO::FETCH_ASSOC);
echo "OK\n";

echo "getting all rows from ActiveProcess table...\n";
$killers = $aimee_db->query("SELECT * FROM ActiveProcess");
echo "killing old processes...\n";
foreach($killers as $killer)
{
    shell_exec("kill ".$killer['pid']);
    print_r($killer);
}
echo "OK\n";

echo "truncating ActiveProcess table...\n";
$kill_garbage = $aimee_db->query("DELETE FROM ActiveProcess");
echo "OK\n";

echo "-> Runnig tasks...\n";

/*foreach ($tasks as $task) {
    echo "Task id: " , $task['task_id'] , "\n";
}
exit;*/

while(true)
{
    foreach ($tasks as $task) 
    {
        $task_id = $task['task_id'];
        $user_startegy = $aimee_db->query("SELECT * FROM user_jobs_strategy WHERE id_task='{$task_id}' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
        $time_shedule = $user_startegy['time_shedule'];
        $script_total_repeat = $user_startegy['script_total_repeat'];
        $shedule_script_hours = $user_startegy['shedule_script_hours']*3600;
        $shedule_script_minutes = $user_startegy['shedule_script_minutes']*60;
        echo 'Running task with id:', $task_id, "\n";
        $pid = shell_exec("runuser -l root -c 'php /var/www/aimee/sheduler/task.php {$task_id} >/dev/null & echo $!' ");
        // $pid = shell_exec("runuser -l www-data -c 'php /var/www/aimee/sheduler/task.php {$task_id} >/dev/null & echo $!' ");
        // $pid = shell_exec("runuser -l www-data -s /bin/sh -c 'php /var/www/aimee/sheduler/task.php {$task_id} >/dev/null & echo $!' ");
        echo "pid: ",$pid,"\n";
        // $pid = shell_exec("runuser -l www-data -c 'php /var/www/aimee/sheduler/task.php {$task_id} 10 {$shedule_script_minutes} >/dev/null & echo $!' ");
        //Update task status to "runned" and insert it into ActivProcess table:
        $update_status = $aimee_db->query("UPDATE ReadyToRun SET status='runned' WHERE task_id='{$task_id}'"); 
        $result = $aimee_db->exec("INSERT INTO ActiveProcess(task_id, pid, sheduler_name) VALUES ('{$task_id}', '{$pid}', 'sheduler_1')");
    }

    $tasks = $aimee_db->query("SELECT * FROM ReadyToRun WHERE status='run'");

    // echo "Sleeeeep...";
    echo "Waiting {$defaultSleepTime} sec...\r\n";
    sleep($defaultSleepTime);
}


 ?>
