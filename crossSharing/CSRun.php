<?php
/**
 * Created by PhpStorm.
 * User: nafe
 * Date: 15.05.2017
 * Time: 10:52
 */

    include 'db.php';


    function Running($argv,$pdo){

        //stripslashes($argv[1]);
        $diff = $argv[1]; // diff seconds
        $id_task = $argv[2];  // id_task
        $repeat = 0;
           
        echo "diff:".$diff;
        echo "\n"."id_task:".$id_task;
        echo "\n";
        
        // $h = shell_exec("php CSTime.php texthduefjk");

        $stmt = $pdo->query("SELECT * FROM cs_time_strategy WHERE `id_task` = '$id_task'");
        // print_r($stmt);

        // print_r($argv);
        // print_r($stmt);
        // exit;

            
        foreach ($stmt as $value)
        {

            $param1 = 'running';
            $repeat = $value["repeat"];
            echo "\r\n";
            $param2 = $value["script_parametrs"];
            $sending = 'sending';
            
            $stmt = $pdo->prepare("UPDATE `cs_time_strategy` SET `script_parametrs`=:sending, `update_at`=NOW() WHERE `script_parametrs` = :param1 AND `id_task` = :id_task");
            // $stmt = $pdo->prepare("UPDATE cs_time_strategy SET script_parametrs='sending', update_at=NOW() WHERE `script_parametrs` = ".$param." AND `id_task` = " .$id_task. "");
            $stmt->bindParam(':param1', $param1);
            $stmt->bindParam(':id_task', $id_task);
            $stmt->bindParam(':sending', $sending);
            $stmt->execute();
            
            //echo resualt 
            echo $value["script_name"] . " " .$value["script_parametrs"]. " " . $value["time_shedule"]. " " . $value["id"] . " " . $value["repeat"] ."\n";

        }

        // return shell_exec("php /var/www/aimee/crossSharing/CSTime.php textFromRun");

        // send to cs_atTime()
        while ($repeat != 0) {
            //waiting to send

            sleep($diff);
            
            //send 
            
            // $url = "http://localhost/cross_post?id=".$id_task;

            $url = "http://localhost/cross_post?task_id=".$id_task;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            if(!empty($post)) {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            }
            $result = curl_exec($ch);
            curl_close($ch);

            echo $result;
            echo "\r\n";


            //repeat
            if (stristr($result, "File sending")) {
                # code...
                $repeat = $repeat - 1;
                $stmt = $pdo->prepare("UPDATE `cs_time_strategy` SET `repeat` = :repeat WHERE `id_task` = :id_task");
                $stmt->bindParam(':repeat', $repeat);
                $stmt->bindParam(':id_task', $id_task);
                $stmt->execute();

                echo "Reapeat: ".$repeat."\n";    
            } else if ($repeat > 0) {

                $error = "error sending";
                $stmt = $pdo->prepare("UPDATE `cs_time_strategy` SET `script_parametrs` = :error WHERE `id_task` = :id_task");
                $stmt->bindParam(':error', $error);
                $stmt->bindParam(':id_task', $id_task);
                $stmt->execute();

                echo $error."\n";
                break;
            } 
            else {
                continue;
            }
        }

        // End  


        $done = "done";
        $stmt = $pdo->prepare("UPDATE `cs_time_strategy` SET `script_parametrs` = :done WHERE `id_task` = :id_task");
        $stmt->bindParam(':done', $done);
        $stmt->bindParam(':id_task', $id_task);
        $stmt->execute();

        // return Running($argv,$pdo);
        return 0;
    }

    Running($argv,$pdo);