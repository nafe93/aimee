<?php
/**
 * Created by PhpStorm.
 * User: abloko
 * Date: 05.03.17
 * Time: 14:28
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class User_Instagram_Accounts
{
    protected static $id_user;
    protected static $id_user_instagram;
    protected static $user_instagram_login;
    protected static $instagram_access_token;
    protected static $date_create;
    protected static $date_end_of_life;
    protected static $authorization;
    protected static $self_token;

    public static function setMainVariables($id_user="",
                                            $id_user_instagram="",
                                            $user_instagram_login="",
                                            $instagram_access_token="",
                                            $date_end_of_life="",
                                            $authorization=false)
    {
        self::$id_user = $id_user;
        self::$id_user_instagram = $id_user_instagram;
        self::$user_instagram_login = $user_instagram_login;
        self::$instagram_access_token = $instagram_access_token;
        self::$date_create = date('d.m.y');
        self::$date_end_of_life = $date_end_of_life;
        self::$authorization = $authorization;
        self::$self_token = strtolower(md5(self::$user_instagram_login . self::$instagram_access_token . "SOMESALTLN"));
    }
    public static function addUserInstagramAccount()
    {
        if(empty(self::$id_user))
            return 0;
        if(empty(self::$id_user_instagram))
            return 0;
        if(empty(self::$user_instagram_login))
            return 0;
        if(empty(self::$instagram_access_token))
            return 0;
        if(empty(self::$date_end_of_life))
            return 0;
        else
            return DB::table('user_instagram_accounts')->insert([
                ['id_user' => self::$id_user,
                    'id_user_instagram' =>self::$id_user_instagram,
                    'user_instagram_name'=>self::$user_instagram_login,
                    'instagram_access_token' => self::$instagram_access_token,
                    'date_create' => self::$date_create,
                    'date_end_of_life' => self::$date_end_of_life,
                    'authorization' => self::$authorization,
                    'self_token' => self::$self_token]
            ]);
    }
    public static function getInstagramAccounts($auth_user_id)
    {
        return DB::table('user_instagram_accounts')
            ->where('id_user', '=', $auth_user_id)
            ->get();
    }
    public static function checkInstagramAccount($id_user_instagram) {
     //   $result =  DB::table('user_instagram_accounts')->select
       //     ->where([['id_user_instagram', '=', $id_user_instagram]])
         //   ->get();
       // if (empty($result))
            return true;
      //  else
       //     return false;
    }
    public static function showInstagramSecretToken($id, $id_user, $self_token)
    {
        return DB::table('user_instagram_accounts')
            ->select('instagram_access_token')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    public static function getInstagramSecretTokenForJOB($user_id, $instagram_account)
    {
        return DB::table('user_instagram_accounts')
            ->select('instagram_access_token')
            ->where([['id_user','=',$user_id], ['user_instagram_name','=',$instagram_account]])
            ->get();
    }

    public static function getInstagramRowAccount($id_user, $id, $self_token)
    {
        return DB::table('user_instagram_accounts')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }
    public static function deleteInstagramAccount($id, $id_user, $self_token)
    {
        return DB::table('user_instagram_accounts')
            ->where('id', '=', $id)
            ->where('id_user', '=', $id_user)
            ->where('self_token', '=', $self_token)
            ->delete();
    }

}