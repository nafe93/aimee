<?php
/**
 * Created by PhpStorm.
 * User: nafe
 * Date: 15.03.2017
 * Time: 10:27
 */

namespace App\Http\Controllers;

use App\Console\Commands\Twitter;
use function Clue\StreamFilter\append;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User_LinkedIn_Accounts;
use App\User_Instagram_Accounts;
use App\User_Google_accounts;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_scripts;
use App\Repositories\TwitterRepository;
use App\Repositories\AimeeLoggerRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Plugins\TwitterPlug;
use App\AddAndStartPlugin;
use App\ShedulStart\ShedulEntry;
use App\Repositories\FacebookRepository;
//use App\Contracts\Repositories\LinkedInRepository;
use App\Repositories\LinkedInRepository as LinkedInRepositoryContract;
use cloudinary\Cloudinary;
use cloudinary\Uploader;
use cloudinary\Api;
use function PHPSTORM_META\type;


class CrossSheringController extends Controller
{
        
    /* --------- START maks_2 scripts --------- */


    public static function fbCallback(Request $request)
    {
        // print_r($request->code);
        return response()->json([
            'code' => $request->code,
        ]);
    }

    /**
     * Saving User synchronization script and begin to synchronize
     * @param  Request      $request        user request
     * @return [type]                       [description]
     */
    public static function saveUserSync(Request $request)
    {
        // $result['user_id'] = $user_id;
        // $result['user_account'] = $user_account_arr;
        // $result['shedule_script_hours'] = $request['shedule_script_hours'];
        // $result['shedule_script_minutes'] = $request['shedule_script_minutes'];
        // $result['script_total_repeat'] = $request['script_total_repeat'];
        // $result['target_accaunt'] = $user_target_account_arr;

        

        $user_id = $request['user_id'];
        $user_account = array_diff($request['user_account'], array(''));
            $user_account_arr = array();
        $source_account_arr = array();
        $user_target_account_arr = array();
        
        $i=1;
        foreach ($user_account as $account) {
            $user_account_arr['user_account_' . $i] = $account;
            $i++;
        }

        $i=1;
        $user_target_account = array_diff($request['target_accaunt'], array(''));
        foreach ($user_target_account as $account) {
            $user_target_account_arr['user_target_account_' . $i] = $account;
            $i++;
        }
        // print_r("Hello");
         
        unset($i);

        $script_name = $request['script_name'];
        // $keys = $request['script_name_parameters'];
        // $values = $request['script_parameters'];
        $sheduler_parameters = "";
        // $script_parameters = array_combine($keys, $values);
        $user_tokens = array();

        $Script = new User_scripts();
        $script_params =  $Script::getParameters($script_name);
        $script_target = $script_params[0]->script_target;

        switch ($request['social_network'][0]){
            case "Twitter":
                $Accounts = new User_twitter_accounts();
                $Accounts = $Accounts::getTwitterAccounts($user_id);
                $user_tokens[1] = $Accounts[0]->twitter_access_token;
                $user_tokens[2] = $Accounts[0]->twitter_access_token_secret;
                break;
            case "Facebook":
                $Accounts = new User_facebook_accounts();
                $Accounts = $Accounts::getFacebookAccounts($user_id);
                $user_tokens[1] = $Accounts[0]->facebook_access_token;
                $log = new AimeeLoggerRepository();
                $log->WriteLog("1","2",'FB1',$user_tokens[1],"RUN_EXTERNAL");
                break;
            case "Sync":
                $log = new AimeeLoggerRepository();
                $log->WriteLog("1","2",'Sync',$user_tokens[1],"RUN_EXTERNAL");
        }

        // $script_parameters = json_encode($script_parameters);
        
        $result = array();
        $result['user_id'] = $user_id;
        $result['user_account'] = $user_account_arr;
        $result['shedule_script_hours'] = $request['shedule_script_hours'];
        $result['shedule_script_minutes'] = $request['shedule_script_minutes'];
        $result['script_total_repeat'] = $request['script_total_repeat'];
        $result['target_accaunt'] = $user_target_account_arr;

        $result['social_network'] = '{"social_network_1":"synchronization"}';
        $result['social_network'] = ['social_network_1' => 'synchronization'];
        $result['script_name'] = 'Sync';
        $result['script_parameters'] = '{}';
        $result['user_tokens'] = $user_tokens;
        $result['user_message'] = '';
        $result['check_shedule'] = trim($request['check_shedule']) or 'on';
        $result['time_shedule'] = date('d.m.Y h:i', time());; //$request['time_shedule'];
        $result['source_network'] = '{"source_network_1":"synchronization"}'; //$source_network_arr;
        $result['source_account'] = '{"source_account_1":"synchronization"}'; //$source_account_arr;
        $result['script_tcreated_time'] = date('Y-m-d H:i:s');


        /**
         * @todo  maks_2: StartPlugin dont return true
         */
        if (AddAndStartPlugin::StartPlugin($result)) {
            // self::saveUserScriptStrategy($result);  
            // return 'Myaf';          
        } else {
            // return 'Gaf';
        }
        

        unset($Accounts);
        unset($Script);
        // return '<br>Finished';
        // return var_dump($result);
    }


    public static function saveUserScriptStrategy($data)
    {

        $id = md5(date('l dS of F Y h:i:s A'));
        $postdata = http_build_query(
            array(
                'id' => $id,
            )
        );


        $opts = array('http' =>
            array(
                'method'  => 'GET',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

       // $pid = "";
        $userStrategyScripts = new User_scripts();
        $userStrategyScripts::saveUserScriptStrateg($data,$id);

        unset($userStrategyScripts);
    }

    /* --------- END maks_2 scripts --------- */



    /* --------- START Nafanail scripts --------- */

    public $content = [];
    public $cs_twitter = [];
    public $cs_fb = [];
    public $cs_likedIn = [];
    public $cs_group = [];
    public $test = [];
    public $arr = [];
    public function show(){

        $_count  = 0;
        $_count2 = 0;
        $id = Auth::id();
        $content2 = [];
        $group_names = [];
        $check = Auth::check();
        /*
         * Twitter
         */
        if($check){
            $data_T = DB::table('user_twitter_accounts')->select('*')->where('id_user','=',$id)->get();
            foreach ($data_T as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "Twitter\\\\"."Name: ".$dat->user_twitter_login;
                }
            }
        }
        /*
         * FaceBook
         */
        if($check){
            $data_F = DB::table('user_facebook_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_F as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "FaceBook\\\\"."Name: ".$dat->user_facebook_login . " ID: " .  $dat->id_user_facebook;
                }
            }
        }
        /*
         * LinkedIn
         */
        if($check){
            $data_L = DB::table('user_linkedin_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_L as $dat){
                if($id == $dat->id_user){
                    $this->content[] =  "LinkedIn\\\\"."Name: ".$dat->user_linkedin_name . " ID: " . $dat->id_user_linkedin;
                }
            }
        }
        /*
         * Google
         */
        if($check){
            $data_G = DB::table('user_google_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_G as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "Google\\\\"."Name: ".$dat->user_google_name . " ID: " . $dat->id_user_google;
                }
            }
        }
        /*
         * Instagram
         */
        if($check){
            $data_I = DB::table('user_instagram_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_I as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "Instagram\\\\"."Name: ".$dat->user_instagram_name . " ID: " . $dat->id_user_instagram;
                }
            }
        }
        /*
         * Group
         */
        if($check){
            $data_G = DB::table('cs_user_group_table')->select('*')->where('user_id','=',$id)->get();
            foreach ($data_G as $dat){
                if($id == $dat->user_id){
                    //$content[] = "Group\\\\"."Name: ".$dat->user_instagram_name . " ID: " . $dat->id_user_instagram;
                    $group_names[] = $dat->group_name;
                    $content2[] = $dat->target;
                }
            }
        }

        asort($this->content);
        asort($content2);
        asort($group_names);
//        dump($this->alters);
        //Return all
        return view('dashboard.cross-sharing')->with(array('data'=>$this->content,'data2'=>$content2,'group_names'=>$group_names));
//        return view('dashboard.cross-sharing')->with('data',response()->json(['data' => $content]),true);
    }

    public function creat_group(Request $r) {
        $obj = $r->param1;
        $group_name = $r->group_name;
//        $this->show($alters);

        DB::table('cs_user_group_table')->insert(
            [
                'user_id'=>Auth::id(),
                'created_at'=> \Carbon\Carbon::now(),
                'updated_at'=> \Carbon\Carbon::now(),
                'target' => $obj,
                'group_name' =>$group_name
            ]
        );
        return array($r->param1);
    }

    public function edit_to_groups(Request $r) {
        $obj = $r->param1;
        $group_name = $r->group_name;
//        $this->show($alters);

        $data_Edit = DB::table('cs_user_group_table')->select('*')->get();
        foreach ($data_Edit as $dat) {
            if ($group_name == $dat->group_name) {
                DB::table('cs_user_group_table')->where('group_name', '=', $group_name)->update(
                    [
//                        'user_id'=>Auth::id(),
                        'updated_at'=> \Carbon\Carbon::now(),
                        'target' => $obj,
                        'group_name' =>$group_name
                    ]
                );
            }
        }
        return array($r->param1);
    }

    public function select_groups(Request $r) {
        $alters = $r->alters;
        $users = DB::table('cs_user_group_table')->where('group_name', '=', $alters)->first();
        return $users->group_name;
    }

    public function rename(Request $r) {
        $name = $r->cs_name;
        $rename = $r->cs_rename;
        $users = DB::table('cs_user_group_table')->where('group_name', '=', $name)->update(
            [
                'updated_at'=> \Carbon\Carbon::now(),
                'group_name' =>$rename
            ]
        );
        return "Renamed successfully";
    }

    public function cs_delete(Request $r){
        $name = $r->cs_name;

        $user = $users = DB::table('cs_user_group_table')->where('group_name', '=', $name)->delete();

        return "The group was successfully deleted";
    }

    public function edit_groups(Request $r) {
        $alters = $r->alters;
        $users = DB::table('cs_user_group_table')->where('group_name', '=', $alters)->first();
        return $users->target;
    }

    public function get_all(Request $r) {
        $social = $r->social;
        $this->show();
        return $this->content;
    }

    public function  get_all_twitter(Request $r)
    {
        $id = Auth::id();
        $twitter_list = DB::table('user_twitter_accounts')->select('user_twitter_login')->where('id_user',$id)->get();
        sort($twitter_list);
        return $twitter_list;
    }

    public function crossSharingNow(Request $r) {
        try {

            \Cloudinary::config(array(
                "cloud_name" => "aimee",
                "api_key" => "244661945125895",
                "api_secret" => "Q1QXVODy06GHZcCqh9vFNRSF3Js"
            ));
            //title
            $title = $r->cs_title;
            //key
            $key = $r->key;
            //content
            $cs_content = $r->cs_content;
            $cs_twitter = strip_tags($cs_content);
            $gg = 0;
            //base64 of images
            $cs_images_twitter = $r->img_data_twitter;
            $cs_images = $r->img_data;
            $cs_images_url = [];
            //base64 of videos
            $cs_videos = $r->videos;
            $cs_videos_url = [];
            // base64 array
            $cs_array_url = [];

            //image to cloudinary
            for($i = 0; $i < count($cs_images); $i++){
                $img_url = \Cloudinary\Uploader::upload($cs_images[$i]);
                array_push($cs_images_url,$img_url['url']);
            }
            //video to
            for($i = 0;$i<count($cs_videos);$i++){
                //Post video to Cloudinary
                $video_url = \Cloudinary\Uploader::upload($cs_videos[$i],array("resource_type" => "video"));
                array_push($cs_videos_url,$video_url['url']);
            }


            // array of socials
            $CrossSharingNow = $r->CrossSharingNow;
            $CrossSharingNow = json_decode($CrossSharingNow, true);

            //choose the social
            foreach ($CrossSharingNow as $i) {
                $var = json_encode($i);
                $var2 = json_decode($var);

                switch ($var2->key) {
                    case "Twitter":
                       if(!in_array($var2->name,$this->arr)){
                           array_push($this->arr, $var2->name);
                           if(count($cs_images_twitter) == 0){
                               $this->cs_twitter($var2->name,$cs_images_twitter[0],$cs_twitter);
                               $this->cs_get_twitter_id($var2->name,$title);
                           }
                           else if(count($cs_images_twitter) != 0){
                               for($i = 0; $i<count($cs_images_twitter);$i++){
                                   $cs_twitter = substr($cs_twitter, 0, 140); // Twit length
                                   $this->cs_twitter($var2->name,$cs_images_twitter[$i],$cs_twitter);
                                   $this->cs_get_twitter_id($var2->name,$title);
                               }
                           }
                       }
                        break;
                    case "FaceBook":
                        if(!in_array($var2->id,$this->arr)){
                            array_push($this->arr, $var2->id);
                            $this->cs_facebook($var2->id,$cs_content,$cs_images_url,$key);
                        }
                        break;
                    case "Instagram":
//                        array_push($arr, "Instagram");
                        break;
                    case "LinkedIn":
//                        array_push($arr, "LinkedIn");
                        if(!in_array($var2->id,$this->arr)) {
                            array_push($this->arr, $var2->id);
                            $cs_content = array($cs_content);
                            $cs_array_url = array_merge($cs_images_url, $cs_videos_url);
                            for ($i = 0; $i < count($cs_array_url); $i++)
                                $this->cs_LinkedIn($var2->id, $cs_content, $cs_array_url[$i]);
                        }
                        break;
                    case "Google":
//                        array_push($arr, "Google");
                        break;
                    case "Group":
//                        array_push($arr, "Group");
                        $this->cs_groups($var2->name,$cs_content,$cs_images_twitter,$cs_images_url,$cs_videos_url,$key,$title);
                        break;
                    default:
                        echo "error";
                }
            }
            unset($this->arr);
            return  $this->arr;//"Sent successfully";//"Sent successfully";//count($cs_images[0]);
        }
        catch (\Exception $e) {
            print 'An error occurred while sending: ' . $e->getMessage();
            print '<br>';
        }
    }



    function cs_twitter($name,$media,$status)
    {
        try{
            if (is_array($status))
                $status = utf8_encode(implode($status));
            else
                $status = utf8_encode($status);

            $myTweet = new TwitterRepository();
            //Account Verification
            $data_T = DB::table('user_twitter_accounts')->select('*')->get();
            foreach ($data_T as $dat) {
                if($name == $dat->user_twitter_login) {
                    if(empty($media)){
                        $myTweet->postTweet($dat->twitter_access_token,$dat->twitter_access_token_secret,$status);
                    }
                    else if(!empty($media)){
                        $myTweet->sendMediaTweet($dat->twitter_access_token,$dat->twitter_access_token_secret,$media,$status);
                    }
                }
            }
        }
        catch (\Exception $e) {
            print 'An error occurred while sending Twitter: ' . $e->getMessage();
            print '<br>';
        }
    }

    function cs_get_twitter_id($name, $title)
    {
        try {
            $myTweet = new TwitterRepository();
            //Account Verification
            $user_twitter_login = DB::table('user_twitter_accounts')->select('user_twitter_login')->where('user_twitter_login', $name)->first();
            $twitter_access_token = DB::table('user_twitter_accounts')->select('twitter_access_token')->where('user_twitter_login',$name)->first();
            $twitter_access_token_secret = DB::table('user_twitter_accounts')->select('twitter_access_token_secret')->where('user_twitter_login',$name)->first();

            if(!empty($user_twitter_login && $twitter_access_token && $twitter_access_token_secret))
            {
                $last_tweet = $myTweet->GetMyTwit($twitter_access_token->twitter_access_token,$twitter_access_token_secret->twitter_access_token_secret,$user_twitter_login->user_twitter_login,1);
                $last_tweet = json_decode($last_tweet);
//                print_r($last_tweet[0]);

                DB::table('tweeter_analytics')->insert(
                    [
                        'user_id'=>Auth::id(),
                        'user_twitter_login'=>$user_twitter_login->user_twitter_login,
                        'created_at'=> \Carbon\Carbon::now(),
                        'updated_at'=> \Carbon\Carbon::now(),
                        'tweet_id' => $last_tweet[0]->id_str,
                        'title' =>$title
                    ]
                );
            }
        }catch (\Exception $e) {
                print 'An error occurred while sending Twitter: ' . $e->getMessage();
                print '<br>';
        }
    }

    function cs_get_best_20_twitter(Request $r)
    {
        try {
            $name = $r->twitterAccount;
            $myTweet = new TwitterRepository();
            $myBestTweets= array();

            //Account Verification
            $user_twitter_login = DB::table('user_twitter_accounts')->select('user_twitter_login')->where('user_twitter_login', $name)->first();
            $twitter_access_token = DB::table('user_twitter_accounts')->select('twitter_access_token')->where('user_twitter_login',$name)->first();
            $twitter_access_token_secret = DB::table('user_twitter_accounts')->select('twitter_access_token_secret')->where('user_twitter_login',$name)->first();

            if(!empty($user_twitter_login && $twitter_access_token && $twitter_access_token_secret))
            {
                $last_tweet = $myTweet->GetFavorites($twitter_access_token->twitter_access_token,$twitter_access_token_secret->twitter_access_token_secret,$user_twitter_login->user_twitter_login);
                $last_tweet = json_decode($last_tweet);
                for($i = 0; $i<count($last_tweet); $i++)
                {
                    array_push($myBestTweets,[
                        'id'=>$last_tweet[$i]->id_str,
                        'likes'=>$last_tweet[$i]->favorite_count,
                        'retweets'=>$last_tweet[$i]->retweet_count
                    ]);
                }
            }
            return $myBestTweets;
        }catch (\Exception $e) {
            print 'An error occurred while sending Twitter: ' . $e->getMessage();
            print '<br>';
        }
    }


    function cs_facebook($id,$status,$images,$key)
    {
        try{

            $id = utf8_encode($id);

            if (is_array($status)) {
                $status[0] = utf8_encode(implode($status));
            } else {
                $status = utf8_encode($status);
            }
            $key = utf8_decode($key);

            /*$imgArr = [];
            foreach ($images as $img) {
                $imgArr[] = utf8_encode($img);
            }
            $images = $img;*/
            
            $myfb = new FacebookRepository();
            //Account Verification
            $data_F = DB::table('user_facebook_accounts')->select('*')->get();
            foreach ($data_F as $dat) {
                if($id == $dat->id_user_facebook) {
//                    print_r($dat->facebook_access_token);
                    $this->cs_fb[] = $dat->facebook_access_token;
                    if(count($images) == 0)
                    {
                        $myfb->postMessage(['message' => utf8_encode( $status )],$dat->facebook_access_token);
                    }
                    else if(count($images) == 1)
                    {
                        $myfb->post_single_Image($status,$images[0],$dat->facebook_access_token);
                    }
                    else if(count($images) > 1 && $key == 0)
                    {
                        $myfb->postCrossImage($status, $images, $dat->facebook_access_token);
                    }
                    else if(count($images) > 1 && $key == 1)
                    {
                        for($i =0; $i< count($images);$i++)
                        {
                            $myfb->post_single_Image($status,$images[$i],$dat->facebook_access_token);
                        }
                    }
                }
            }
        }
        catch (\Exception $e) {
            print 'An error occurred while sending Facebook: ' . $e->getMessage() . $e->getFile() . $e->getLine();
            print '<br>';
        }
    }

    public function cs_LinkedIn($id,$status,$images)
    {
        try{
            $myLIN = new LinkedInRepositoryContract();
            //Account Verification
            $data_L = DB::table('user_linkedin_accounts')->select('*')->get();
            foreach ($data_L as $dat) {
                // if('7' == $dat->id_user) {
                if($id == $dat->id_user_linkedin) {
                    $this->cs_likedIn[] = $dat->linkedin_access_token;
                    $myLIN->postImages($dat->linkedin_access_token,$status,$images);
                    // print_r('->Your ID Found<-');
                } else {
                    // print_r('Your id not found');
                }
            }

        }
        catch (\Exception $e) {
            print 'An error occurred while sending LinkedIn: ' . $e->getMessage() . $e->getFile() . $e->getLine();
            print '<br>';
        }
    }

    public function cs_LinkedIn_messages($id, $statusses)
    {
        try{
            $myLIN = new LinkedInRepositoryContract();
            //Account Verification
            $data_L = DB::table('user_linkedin_accounts')->select('*')->get();
            foreach ($data_L as $dat) {
                // if('7' == $dat->id_user) {
                if($id == $dat->id_user_linkedin) {
                    $this->cs_likedIn[] = $dat->linkedin_access_token;
                    $myLIN->post($dat->linkedin_access_token,$statusses);
                    // print_r('->Your ID Found<-');
                } else {
                    // print_r('Your id not found');
                }
            }
        }
        catch (\Exception $e) {
            print 'An error occurred while sending LinkedIn: ' . $e->getMessage() . $e->getFile() . $e->getLine();
            print '<br>';
        }
    }

    /**
     * @param $group_name
     * @param $status
     * @param $images
     */
    public function cs_groups($group_name, $status,$images_twitter,$images,$videos,$keys,$title)
    {
        try{
//            $myLIN = new LinkedInRepositoryContract();
            //Account Verification
            $data_G = DB::table('cs_user_group_table')->select('*')->get();
            foreach ($data_G as $dat) {
                if($group_name == $dat->group_name) {
                    $obj = json_decode($dat->target);
                    $this->cs_group[] = $obj;
                    foreach ($this->cs_group as $key){
                        $vars = json_encode($key);
                        $vars2 = json_decode($vars);
                        foreach ($vars2 as $var){
                            $this->test[] = $var->name;
                            //choose the social
                            switch ($var->key) {
                                case "Twitter":
                                    if(!in_array($var->name,$this->arr))
                                    {
                                        var_dump(in_array($var->name,$this->arr));
                                        array_push($this->arr,$var->name);
                                        if(count($images_twitter) == 0)
                                        {
                                            $this->cs_twitter($var->name,$images_twitter[0],$status);
                                            $this->cs_get_twitter_id($var->name,$title);
                                        }
                                        else if(count($images_twitter) != 0){
                                            for($i = 0; $i<count($images_twitter);$i++){
                                                $status = substr($status, 0, 140); // Twit length
                                                $this->cs_twitter($var->name,$images_twitter[$i],$status);
                                                $this->cs_get_twitter_id($var->name,$title);
                                            }
                                        }
                                        //$this->cs_twitter($var->name,$status,$images_twitter);
                                    }
                                    break;
                                case "FaceBook":
                                    if(!in_array($var->id,$this->arr)){
                                        array_push($this->arr, $var->id);
                                        $this->cs_facebook($var->id,$status,$images,$keys);
                                    }
                                    break;
                                case "Instagram":
                                    //array_push($var->id, "Instagram");
                                    break;
                                case "LinkedIn":
                                    if(!in_array($var->id,$this->arr)) {
                                        array_push($this->arr, $var->id);
                                        $status = array($status);
                                        $cs_array_url = array_merge($images, $videos);
                                        for ($i = 0; $i < count($cs_array_url); $i++){
                                            $this->cs_LinkedIn($var->id,$status,$cs_array_url[$i]);
                                        }
                                    }
                                    break;
                                case "Google":
                                    //array_push($var->id, "Google");
                                    break;
                                default:
                                    echo "error";
                            }
                        }
                    }
//                    $myLIN->post($dat->linkedin_access_token,$status);
                }
            }

        }
        catch (\Exception $e) {
            print 'An error occurred while sending Group: ' . $e->getMessage() . $e->getFile() . $e->getLine();
            print '<br>';
        }
    }
    

    /* --------- END Nafanail scripts --------- */

}


?>

