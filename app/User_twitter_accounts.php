<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class User_twitter_accounts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected static $id_user;
    protected static $user_twitter_login;
    protected static $twitter_access_token;
    protected static $twitter_access_token_secret;
    protected static $authorization;
    protected static $self_token;

    public static function setMainVariables($id_user="", $user_twitter_login="", $twitter_access_token="", $twitter_access_token_secret="", $authorization=false){
        self::$id_user = $id_user;
        self::$user_twitter_login = $user_twitter_login;
        self::$twitter_access_token = $twitter_access_token;
        self::$twitter_access_token_secret = $twitter_access_token_secret;
        self::$authorization = $authorization;
        self::$self_token = strtolower(md5(self::$user_twitter_login.self::$twitter_access_token."SOMESALT"));
    }

    public static function addUserTwitterAccount()
    {
        if(empty(self::$id_user))
            return 0;
        if(empty(self::$user_twitter_login))
            return 0;
        if(empty(self::$twitter_access_token))
            return 0;
        if(empty(self::$twitter_access_token_secret))
            return 0;
        else
            return DB::table('user_twitter_accounts')->insert([
                ['id_user' => self::$id_user,
                'user_twitter_login' =>self::$user_twitter_login,
                'twitter_access_token' => self::$twitter_access_token,
                'twitter_access_token_secret' => self::$twitter_access_token_secret,
                'authorization' => self::$authorization,
                'self_token' => self::$self_token]
            ]);
    }

    public static function getTwitterAccounts($auth_user_id)
    {
        return DB::table('user_twitter_accounts')
            ->where('id_user', '=', $auth_user_id)
            ->get();
    }

    public static function checkTwitterAccount($user_twitter_login, $twitter_access_token, $twitter_access_token_secret) {
        $result =  DB::table('user_twitter_accounts')
            ->where([['user_twitter_login', '=', $user_twitter_login],
                ['twitter_access_token', '=', $twitter_access_token],
                ['twitter_access_token_secret', '=', $twitter_access_token_secret]])
            ->get();
        if (empty($result))
            return true;
        else
            return false;
    }

    public static function showTwitterSecretToken($id, $id_user, $self_token)
    {
        return DB::table('user_twitter_accounts')
            ->select('twitter_access_token_secret')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    public static function getTwitterRowAccount($id_user, $id, $self_token)
    {
        return DB::table('user_twitter_accounts')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    //Delete if no more need
//    public static function editTwitterAccount($id, $id_user, $self_token, $user_twitter_login, $twitter_access_token, $twitter_access_token_secret, $authorization)
//    {
//        return DB::table('user_twitter_accounts')
//            ->where([['id', '=', $id],
//                    ['id_user', '=', $id_user],
//                    ['self_token', '=', $self_token]])
//            ->update([
//                    'user_twitter_login' => $user_twitter_login,
//                    'twitter_access_token' => $twitter_access_token,
//                    'twitter_access_token_secret' => $twitter_access_token_secret,
//                    'authorization' => $authorization
//            ]);
//    }

    public static function deleteTwitterAccount($id, $id_user, $self_token)
    {
        return DB::table('user_twitter_accounts')
            ->where('id', '=', $id)
            ->where('id_user', '=', $id_user)
            ->where('self_token', '=', $self_token)
            ->delete();
    }

}