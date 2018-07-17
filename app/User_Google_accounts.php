<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 06.03.2017
 * Time: 14:04
 */

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class User_Google_accounts
{
    protected static $id_user;
    protected static $id_user_google;
    protected static $user_google_login;
    protected static $google_access_token;
    protected static $date_create;
    protected static $date_end_of_life;
    protected static $authorization;
    protected static $self_token;
    protected static $refresh_token;
    public static function setMainVariables($id_user="",
                                            $id_user_google="",
                                            $user_google_login="",
                                            $google_access_token="",
                                            $date_end_of_life="",
                                            $authorization=false,
                                            $refresher = '')
    {
        self::$id_user = $id_user;
        self::$id_user_google = $id_user_google;
        self::$user_google_login = $user_google_login;
        self::$google_access_token = $google_access_token;
        self::$date_create = date('d.m.y');
        self::$date_end_of_life = $date_end_of_life;
        self::$authorization = $authorization;
        self::$self_token = strtolower(md5(self::$user_google_login . self::$google_access_token . "SOMESALTLNG"));
        self::$refresh_token = $refresher;
    }

    public static function addUserGoogleAccount()
    {
        if(empty(self::$id_user))
            return 0;
        if(empty(self::$id_user_google))
            return 0;
        if(empty(self::$user_google_login))
            return 0;
        if(empty(self::$google_access_token))
            return 0;
        if(empty(self::$date_end_of_life))
            return 0;
        else
            return DB::table('user_google_accounts')->insert([
                ['id_user' => self::$id_user,
                    'id_user_google' =>self::$id_user_google,
                    'user_google_name'=>self::$user_google_login,
                    'google_access_token' => self::$google_access_token,
                    'date_create' => self::$date_create,
                    'date_end_of_life' => self::$date_end_of_life,
                    'authorization' => self::$authorization,
                    'self_token' => self::$self_token,
                    'refresh_token' => self::$refresh_token]
            ]);
    }

    public static function getGoogleAccounts($auth_user_id)
    {
        return DB::table('user_google_accounts')
            ->where('id_user', '=', $auth_user_id)
            ->get();
    }
    public static function checkGoogleAccount($id_user_google) {
        $result =  DB::table('user_google_accounts')
            ->where([['id_user_google', '=', $id_user_google]])
            ->get();
        if (empty($result))
            return true;
        else
            return false;
    }

    public static function showGoogleSecretToken($id, $id_user, $self_token)
    {
        return DB::table('user_google_accounts')
            ->select('google_access_token')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }

    public static function getGoogleRowAccount($id_user, $id, $self_token)
    {
        return DB::table('user_google_accounts')
            ->where([['id', '=', $id],
                ['id_user', '=', $id_user],
                ['self_token', '=', $self_token]])
            ->get();
    }
    public static function deleteGoogleAccount($id, $id_user, $self_token)
    {
        return DB::table('user_google_accounts')
            ->where('id', '=', $id)
            ->where('id_user', '=', $id_user)
            ->where('self_token', '=', $self_token)
            ->delete();
    }
    public static function refreshTokenGoogleAccount($user_id, $user_account,$new_token)
    {
        return DB::table('user_google_accounts')
            ->where('id_user', '=', $user_id)
            ->where('user_google_name', '=', $user_account)
            ->update(['google_access_token' => $new_token]);
    }

    public static function getFullAccessToken($user_id, $user_account)
    {
        $data = DB::table('user_google_accounts')
            ->select('google_access_token')
            ->where('id_user', $user_id)
            ->where('user_google_name', $user_account)
            ->get();
        return $data[0]->google_access_token;
    }

    public static function getFullRefreshToken($user_id, $user_account)
    {
        $data_ref = DB::table('user_google_accounts')
            ->select('refresh_token')
            ->where('id_user', $user_id)
            ->where('user_google_name', $user_account)
            ->get();
        return $data_ref[0]->refresh_token;
    }

}