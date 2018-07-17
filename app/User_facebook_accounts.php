<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_facebook_accounts extends Model
{
    protected static $id_user;
    protected static $id_user_facebook;
    protected static $user_facebook_login;
    protected static $facebook_access_token;
    protected static $date_create;
    protected static $date_end_of_life;
    protected static $authorization;
    protected static $self_token;

    public static function setMainVariables($id_user="",
                                            $id_user_facebook="",
                                            $user_facebook_login="",
                                            $facebook_access_token="",
                                            $date_end_of_life="",
                                            $authorization=false){
        self::$id_user = $id_user;
        self::$id_user_facebook = $id_user_facebook;
        self::$user_facebook_login = $user_facebook_login;
        self::$facebook_access_token = $facebook_access_token;
        self::$date_create = date('d.m.y');
        self::$date_end_of_life = $date_end_of_life;
        self::$authorization = $authorization;
        self::$self_token = strtolower(md5(self::$user_facebook_login.self::$facebook_access_token."SOMESALT"));
    }

    public static function addUserFacebookAccount()
    {
        if(empty(self::$id_user))
            return 0;
        if(empty(self::$id_user_facebook))
            return 0;
        if(empty(self::$user_facebook_login))
            return 0;
        if(empty(self::$facebook_access_token))
            return 0;
        if(empty(self::$date_end_of_life))
            return 0;
        else
            return DB::table('user_facebook_accounts')->insert([
                ['id_user' => self::$id_user,
                    'id_user_facebook' =>self::$id_user_facebook,
                    'user_facebook_login'=>self::$user_facebook_login,
                    'facebook_access_token' => self::$facebook_access_token,
                    'date_create' => self::$date_create,
                    'date_end_of_life' => self::$date_end_of_life,
                    'authorization' => self::$authorization,
                    'self_token' => self::$self_token]
            ]);
    }

    public static function getFacebookAccounts($auth_user_id)
    {
        return DB::table('user_facebook_accounts')
            ->where('id_user', '=', $auth_user_id)
            ->get();
    }

    public static function getFacebookAccountByToken($token)
    {
        return DB::table('user_facebook_accounts')
            ->where('facebook_access_token', '=', $token)
            ->first();
    }

    public static function checkFacebookAccount($id_user_facebook) {
        $result =  DB::table('user_facebook_accounts')
            ->where([['id_user_facebook', '=', $id_user_facebook]])
            ->get();
        if (empty($result))
            return true;
        else
            return false;
    }

    public static function showFacebookSecretToken($id, $id_user, $self_token)
    {
        return DB::table('user_facebook_accounts')
            ->select('facebook_access_token')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    public static function getFacebookRowAccount($id_user, $id, $self_token)
    {
        return DB::table('user_facebook_accounts')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    public static function updateFacebookAccountToken($old_token, $new_token, $expires_in)
    {

        return DB::table('user_facebook_accounts')
            ->where('facebook_access_token', '=', $old_token)
            ->update([
                'facebook_access_token' => $new_token,
                'date_create' => date('d.m.Y'),
                'date_end_of_life' => $expires_in
                ]);
    }

    public static function deleteFacebookAccount($id, $id_user, $self_token)
    {
        return DB::table('user_facebook_accounts')
            ->where('id', '=', $id)
            ->where('id_user', '=', $id_user)
            ->where('self_token', '=', $self_token)
            ->delete();
    }
}

