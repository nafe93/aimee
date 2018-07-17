<?php
/**
 * Created by PhpStorm.
 * User: nafe
 * Date: 12.05.2017
 * Time: 11:37
 */
namespace App\Http\Controllers;

use App\Console\Commands\Twitter;
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

class CrossSharingAtTime extends Controller
{
    public $arrs = [];
    public function saveToDB(Request $r){

        \Cloudinary::config(array(
            "cloud_name" => "aimee",
            "api_key" => "244661945125895",
            "api_secret" => "Q1QXVODy06GHZcCqh9vFNRSF3Js"
        ));
        //images
        $cs_img = $r->cs_images;                    //getImage
        $cs_img_twitter = $r->cs_twitter_images;    //Image base64 for twitter
        $cs_images_url = [];                        //GET url of images from Cloudinary

        //image to cloudinary
        for($i = 0; $i < count($cs_img); $i++){
            $img_url = \Cloudinary\Uploader::upload($cs_img[$i]);
            array_push($cs_images_url,$img_url['url']);
        }

        $script_name = 0;
        $repeat = 0;
        if(empty($r->cs_repeat)|| is_null($r->cs_repeat)){
            $script_name = "SendAtTime";
            $repeat = 1;
        }
        else{
            $script_name = "SendAtIntervals";
            $repeat = $r->cs_repeat;
        }

        $Time = $r->Time;
        $timestamp = date('Y-m-d H:i:s', strtotime($Time));

        //Content to json
        $json_data = array ('content'=>$r->cs_content,'images'=> implode(",", $cs_images_url),'img_twitter'=>$cs_img_twitter);


        DB::table('cs_time_strategy')->insert(
            [
                'user_id'=>Auth::id(),
                'user_account'=>Auth::user()->email,
                'script_name'=> $script_name,
                'script_parametrs' => "waiting",
                'time_shedule'=> $timestamp,
                'create_date'=> \Carbon\Carbon::now(),
                'update_at'=> \Carbon\Carbon::now(),
                'id_task' => md5(rand()),
                'repeat'=> $repeat,
                // 'repeat'=> $r->cs_repeat,
                'cross_sharing_to'=> $r->cross_sharing_to,
                'content'=> json_encode($json_data)
            ]
        );
        return array($Time);
    }
  

    public function cs_atTime(Request $r)
    {
        $task = $r->task_id;

        // DB actions
        
        $cs_content = DB::table('cs_time_strategy')->select('content')->where('id_task','=',$task)->get();
        $cs_to = DB::table('cs_time_strategy')->select('cross_sharing_to')->where('id_task','=',$task)->get();
        
        // var_dump( $cs_to[0] );
        // exit;

        // $cs_to = json_decode($cs_to, true);

        $result = '';

        foreach ($cs_to as $i) 
        {

            $var = json_decode($i->cross_sharing_to);
            //$var2 = json_decode($var);

            $content = '';
            $img = [] ;
            $img_twitter = [];

            foreach ($cs_content as $key)
            {
                foreach ($key as $value)
                {
                    $json =  json_decode($value);
                    $content = $json->content;          //string
                    if(strlen($json->images) > 1)
                    {
                        $img = $json->images;           //string
                    }
                    $img_twitter = $json->img_twitter;  //array
                    var_dump($img_twitter);
                    /*echo "\r\n";
                    print_r("Content: ".$content);
                    echo "r\n";
                    print_r("Img: ".gettype($img));
                    echo "\r\n";
                    var_dump("Img_twitter: ".$img_twitter);
                    echo "\r\n";*/
                }
            }

            // exit;
            
            foreach ($var as $key => $user) {
                if(count($img)>0){
                   // $img = explode(",",$img); //convert to array
                }
                else if(count($img)==0){
                    $img = null;
                }
//                print_r($user->key);
//                print_r($user->name);
                switch ($user->key)
                {
                    case "Twitter":
                        if(!in_array($user->name,$this->arrs))
                        {
                            array_push($this->arrs, $user->name);
                            if(count($img_twitter) == 0)
                            {
                                $content_twitter = substr($content, 0, 140); // Twit length
                                $this->cs_twitter($user->name,$img_twitter[0],$content_twitter);
                            }
                            else if(count($img_twitter) != 0)
                            {
                                for($i = 0; $i<count($img_twitter);$i++)
                                {
                                    $content_twitter = substr($content, 0, 140); // Twit length
                                    $this->cs_twitter($user->name,$img_twitter[$i],$content_twitter);
                                }
                            }
                            //$this->cs_twitter($user->name, $cs_content[0], $cs_content[0]->content);
                        }
                        break;

                    case "FaceBook":
                        if(!in_array($user->id,$this->arrs)){
                            array_push($this->arrs, $user->id);
                            //$this->cs_facebook($var2->id,$cs_content,$cs_images_url,$key);
                            $this->cs_facebook($user->id,$content,$img,0);
                        }
                        else{
                            print_r("you send to this account");
                        }
                        break;

                    case "LinkedIn":
                        // Maybe dont work
                        if(!in_array($user->id,$this->arrs))
                        {
                            array_push($this->arrs, $user->id);
                            $content = array($content);
                            $cs_array_url = array_merge($img/*, $cs_videos_url*/);
                            for ($i = 0; $i < count($cs_array_url); $i++)
                                $this->cs_LinkedIn($user->id, $content, $cs_array_url[$i]);
                        }
//                        $result = $this->cs_LinkedIn($user->id,$cs_content[0]->content,null);
                        break;
                        case "Group":
                        //array_push($arr, "Group");
                        $this->cs_groups($user->name,$content,$img_twitter,$img,null,0);
                        break;

                    default:
                        echo "error";
                        trigger_error("Dont find any social network");
                }
            }
            
        }
        // return
        unset($this->arrs);
//        $headers = ['Content-type'=>'text/plain', 'test'=>'YoYo','X-BooYAH'=>'WorkyWorky','Content-Length'];
        return \Response::make($result, 200);
//        return \Response::make($result, 200, $headers);
    }



    function cs_facebook($id,$status,$images,$key)
    {
        try
        {
            if(preg_match('/,/',$images)==false)
            {
                $images = [$images];
            }
            else if(preg_match('/,/',$images))
            {
                $images = explode(',',$images);
            }

            echo "\r\n";
            print_r(($images));
            echo "\r\n";
//            print_r($status);
//            print_r($id);

            $id = utf8_encode($id);

            if (is_array($status))
            {
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
            foreach ($data_F as $dat)
            {
                if($id == $dat->id_user_facebook)
                {
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


    /*
    
        Twitter

     */

    function cs_twitter($name,$media,$status)
    {
        try{

            if (is_array($status)){
                // $status = utf8_encode(implode($status));
                $status = utf8_encode(implode($status));
                // var_dump($status);
            }
            else{
                $status = utf8_encode($status);
                // var_dump($status);
            }

            $myTweet = new TwitterRepository();
            //Account Verification
            $data_T = DB::table('user_twitter_accounts')->select('*')->get();
            // echo  "<pre>";                   
            // print_r($data_T);

            foreach ($data_T as $dat) 
            {

//                print_r("In loop\r\n");
//                print_r($dat);
//                $myTweet->postTweet($dat->twitter_access_token,$dat->twitter_access_token_secret,$status);
                
                if($name == $dat->user_twitter_login)
                {
                    if(empty($media))
                    {
                        $myTweet->postTweet($dat->twitter_access_token,$dat->twitter_access_token_secret,$status);
                    }
                    else if(!empty($media))
                    {
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

    /**
     * @param $group_name
     * @param $status
     * @param $images
     */
    public function cs_groups($group_name, $status,$images_twitter,$images,$videos,$keys)
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
                                    if(!in_array($var->name,$this->arrs))
                                    {
                                        var_dump($images_twitter);
                                        var_dump($images);
                                        //var_dump(in_array($var->name,$this->arrs));
                                        array_push($this->arrs,$var->name);
                                        if(count($images_twitter) == 0)
                                        {
                                            $status_twitter = substr($status, 0, 140); // Twit length
                                            $this->cs_twitter($var->name,$images_twitter[0],$status_twitter);
                                        }
                                        else if(count($images_twitter) != 0){
                                            for($i = 0; $i<count($images_twitter);$i++){
                                                $status_twitter = substr($status, 0, 140); // Twit length
                                                $this->cs_twitter($var->name,$images_twitter[$i],$status_twitter);
                                            }
                                        }
                                        //$this->cs_twitter($var->name,$status,$images_twitter);
                                    }
                                    break;
                                case "FaceBook":
                                    if(!in_array($var->id,$this->arrs)){

                                        /*
                                         * @test
                                         * */

                                        array_push($this->arrs, $var->id);
                                        $this->cs_facebook($var->id,$status,$images,$keys);
                                    }
                                    break;
                                case "Instagram":
                                    //array_push($var->id, "Instagram");
                                    break;
                                case "LinkedIn":
                                    if(!in_array($var->id,$this->arrs)) {
                                        array_push($this->arrs, $var->id);
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


}