<?php
    include 'db.php';

    $id_task            = $argv[1];
    $round_sleep        = $get_round_time($id_task);
    $defaultRoundSleep  = 10; // sec
    $start_time         = $get_start_time($id_task);
    $total_repeat       = $get_total_repeat($id_task);
    $go___              = "http://debug1.getaimee.com/postcall?id=".$id_task;

    print_r('id task: ' . $argv[1] . "\n");
    print_r('get_round_time: ' . $get_round_time($id_task) . "\n");
    print_r('get_start_time: ' . $get_start_time($id_task) . "\n");
    print_r('get_total_repeat: ' . $get_total_repeat($id_task) . "\n");

    if ($total_repeat < 1) {
        die("This task has no repeats\r\n");
    }
    
    echo "open url: ";
    echo $go___ , "\n";

    echo 'Sleeping ', $start_time, " sec\r\n";
    sleep($get_start_time($id_task));
    $i = 1;
    // $get_start_time($id_task);

    if ($round_sleep < 10) {
        $round_sleep = 30;
    }

    /**
     * This cycle is completely dependent on the number of repetitions in the table col
     * `user_jobs_strategy.script_total_repeat`
     */
    for(; ; )
    {
        $decrement_total_repeat($id_task);
        echo 'Sending postcall..', "\r\n";
        // $url = "http://debug1.getaimee.com/postcall?id=".$id_task;
        $url = "http://localhost/postcall?id=".$id_task;
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
        if ($result) {
            echo "OK\r\n";
        } else {
            echo "Error\r\n";
        }
        curl_close($ch);
        // echo $result;
        $i=$i+1;
        echo "Writing logs..\r\n";
        $write_log($i,$id_task);
        echo "\r\nSleeping $round_sleep sec..\r\n\r\n"; 
        sleep($round_sleep);
        if ($get_total_repeat($id_task) < 1) {
            die("\r\nNumber of repetitions is over. Task completed\r\n");
        }
    }

?>
