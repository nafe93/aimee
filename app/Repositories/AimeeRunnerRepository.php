<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 02.12.2016
 * Time: 9:46
 */

namespace App\Repositories;


class AimeeRunnerRepository
{
   public function RunFromShell($runner,$scripts_type,$script_name,$shell_param)
    {

      echo $runner.' '.$scripts_type.$script_name.' '.$shell_param;
      $shell_out = shell_exec($runner.' '.$scripts_type.$script_name.' '.$shell_param);

      //$shell_out - need write to log
      return $shell_out;
    }
}