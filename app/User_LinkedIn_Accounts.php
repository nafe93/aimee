<?php

/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 28.02.2017
 * Time: 15:53
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_LinkedIn_Accounts  extends Model
{
    protected static $id_user;
    protected static $id_user_linkedin;
    protected static $user_linkedin_login;
    protected static $linkedin_access_token;
    protected static $date_create;
    protected static $date_end_of_life;
    protected static $authorization;
    protected static $self_token;

    public static function setMainVariables($id_user="",
                                            $id_user_linkedin="",
                                            $user_linkedin_login="",
                                            $linkedin_access_token="",
                                            $date_end_of_life="",
                                            $authorization=false){
        self::$id_user = $id_user;
        self::$id_user_linkedin = $id_user_linkedin;
        self::$user_linkedin_login = $user_linkedin_login;
        self::$linkedin_access_token = $linkedin_access_token;
        self::$date_create = date('d.m.y');
        self::$date_end_of_life = $date_end_of_life;
        self::$authorization = $authorization;
        self::$self_token = strtolower(md5(self::$user_linkedin_login.self::$linkedin_access_token."SOMESALTLN"));
    }

    public static function addUserLinkedInAccount()
    {
        if(empty(self::$id_user))
            return 0;
        if(empty(self::$id_user_linkedin))
            return 0;
        if(empty(self::$user_linkedin_login))
            return 0;
        if(empty(self::$linkedin_access_token))
            return 0;
        if(empty(self::$date_end_of_life))
            return 0;
        else
            return DB::table('user_linkedin_accounts')->insert([
                ['id_user' => self::$id_user,
                    'id_user_linkedin' =>self::$id_user_linkedin,
                    'user_linkedin_name'=>self::$user_linkedin_login,
                    'linkedin_access_token' => self::$linkedin_access_token,
                    'date_create' => self::$date_create,
                    'date_end_of_life' => self::$date_end_of_life,
                    'authorization' => self::$authorization,
                    'self_token' => self::$self_token]
            ]);
    }
    public static function getLinkedInAccounts($auth_user_id)
    {
        return DB::table('user_linkedin_accounts')
            ->where('id_user', '=', $auth_user_id)
            ->get();
    }
    public static function checkLinkedInAccount($id_user_linkedin) {
        $result =  DB::table('user_linkedin_accounts')
            ->where([['id_user_linkedin', '=', $id_user_linkedin]])
            ->get();
        if (empty($result))
            return true;
        else
            return false;
    }
    public static function showLinkedInSecretToken($id, $id_user, $self_token)
    {
        return DB::table('user_linkedin_accounts')
            ->select('linkedin_access_token')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    public static function getLinkedInRowAccount($id_user, $id, $self_token)
    {
        return DB::table('user_linkedin_accounts')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    public static function deleteLinkedInAccount($id, $id_user, $self_token)
    {
        return DB::table('user_linkedin_accounts')
            ->where('id', '=', $id)
            ->where('id_user', '=', $id_user)
            ->where('self_token', '=', $self_token)
            ->delete();
    }



}