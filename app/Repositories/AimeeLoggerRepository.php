<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 09.12.2016
 * Time: 13:27
 */

namespace App\Repositories;


class AimeeLoggerRepository
{
  public function WriteLog($user_id,$process_id,$source,$message,$technical_info)
  {
     $result = \DB::table('aimee_logger')->insert(['user_id' => $user_id,'process_id' => $process_id, 'source' => $source,'message' => $message, 'technical_info' => $technical_info]);
     return $result;
  }
}