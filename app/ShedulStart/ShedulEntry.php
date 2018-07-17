<?php

namespace App\ShedulStart;
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 13.02.17
 * Time: 10:20
 */

use App\AddAndStartPlugin;


class ShedulEntry extends \Thread
{
    private $dat;

    public function __construct($data)
    {
        $this->dat = $data;
    }

    public function run() {
        $data = $this->dat;
        $flag = true;
        $total_repeat = $data['script_total_repeat'];
        $h = $data['shedule_script_hours'];
        $m = $data['shedule_script_minutes'];
        $timeout = $h * 120 + $m * 60;
        if ($data['script_total_repeat'] < 0) $flag = false;

        while ($total_repeat != 0 && $flag == true) {
            AddAndStartPlugin::StartPlugin($data);
            $total_repeat--;
            sleep($timeout);
        }
    }

}

?>