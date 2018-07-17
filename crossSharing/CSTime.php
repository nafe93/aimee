<?php
/**
 * Created by PhpStorm.
 * User: nafe
 * Date: 12.05.2017
 * Time: 14:29
 */
include 'db.php';

class CS_TIME{

    //To open in new cmd for windows server
    public function execInBackground($cmd) {
        if (substr(php_uname(), 0, 7) == "Windows"){
            pclose(popen("start /B ". $cmd, "r"));
        }
        else {
            exec($cmd . " > /dev/null &");
        }
    }


    public function runAroundDB($pdo) {
        try
        {

            /*$md5 = md5($ids);
            $stmt = $pdo->prepare('UPDATE cs_time_strategy SET id_task = :md5 WHERE id = :ids');
            $stmt->bindParam(':md5', $md5);   
            $stmt->bindParam(':ids', $ids);                                                           
            $stmt->execute();*/

            $stmt = $pdo->query("SELECT * FROM `cs_time_strategy` ORDER BY `cross_sharing_to` DESC LIMIT 100") or die(print_r($pdo->errorInfo(), true));

            
            if(!empty($stmt))
            {
                foreach ($stmt as $value)
                {

                    //Get Time of the current column;
                    $diff = strtotime($value["time_shedule"])-time();  // 105
                    $ids = $value["id"]; // 34
                    $id_task = $value["id_task"];  // first time empty

                    //Get view parameters of the current column;
                    
                    echo $value["script_name"] . " " .$value["script_parametrs"]. " " . $value["time_shedule"]. " " .$diff. " ". $ids ."\n";

                    
                    //execInBackground('start cmd.exe @cmd /k "command"');

                    // check if waiting
                    // print_r($value);
                    // exit;
                    if($value["script_parametrs"] === "waiting")
                    {
                        print_r("In IF\r\n");
                        //Send parameters to CSRun.php using linux
                        //$pid = shell_exec("runuser -l www-data -c 'php crossSharing/CSRun.php {$diff} >/dev/null & echo $!' ");
                        // $h = shell_exec("php CSRun.php $diff");
                        // echo $h;
                        //task_id
                        
                        echo "pdo executed\r\n";
                        
                        echo "shell_exec starting...\r\n";
                        $pid = shell_exec("runuser - root -l www-data -c 'php /var/www/aimee/crossSharing/CSRun.php $diff $id_task >/dev/null & echo $!'");
                        echo "PID:" . $pid;
                        echo "shell_exec executed with pid: {$pid}\r\n";

                        // print_r( shell_exec("runuser - root -l www-data -c 'php /var/www/aimee/crossSharing/CSRun.php {$diff} {$id_task}' ") );


                        //Change script_parametrs from waiting to running in current script_parametrs
                        $param1 = 'waiting';
                        $param2 = $value["script_parametrs"];
                        // $stmt = $pdo->prepare("UPDATE cs_time_strategy SET script_parametrs='running' WHERE '$params2' = :param1");  
                        $stmt = $pdo->prepare("UPDATE cs_time_strategy SET script_parametrs='running' WHERE script_parametrs  = :param2");  
                        // $stmt->bindParam(':param1', $param1);
                        $stmt->bindParam(':param2', $param2);
                        $stmt->execute();
                        

                    }
                    else
                    {
                        print_r("In ELSE\r\n");

//                        usleep (500000);
//                        $param1 = 'running';
//                        $param2 = $value["script_parametrs"];
//                        $stmt = $pdo->prepare("UPDATE cs_time_strategy SET script_parametrs='waiting' WHERE '$param2' = :param1");
//                        $stmt->bindParam(':param1', $param1);
//                        $stmt->execute();
                        continue;
                    }
                }
            }

            
            // sleep(1);
            //recursion
            // $this->runAroundDB($pdo);

        }catch (PDOException $e) {
            die(' Some thing go wrong with db : ' . $e->getMessage());
        }
    }
}

$Time = new CS_TIME();

for (; ; ) { 
    $Time->runAroundDB($pdo);
    sleep(1);
}

unset($Time);

?>