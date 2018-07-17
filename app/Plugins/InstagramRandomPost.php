<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 07.03.2017
 * Time: 10:13
 */

namespace App\Plugins;

use App\PluginInterfase;
use App\Console\Commands\Twitter;
use App\Repositories\InstagramRepository;
use Illuminate\Http\Request;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_Instagram_Accounts;
use App\User_scripts;
use App\Repositories\TwitterRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AimeeLoggerRepository;
require_once("upload-master/instaW.php");
require_once("upload-master/functions.php");

class InstagramRandomPost
{
    public static function Run($run_array) {

        try {
            
            $log = new AimeeLoggerRepository();
            // $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"NAME-SOCNET");
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_INSTAGRAM_RANDOM_POST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $param_json = $run_array['params'];
            $param = json_decode($param_json);

            $InstagramAcc = new User_Instagram_Accounts();
            $InUserToken=$InstagramAcc->getInstagramSecretTokenForJOB($user_id,$source_acc);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INITIATED_INSTAGRAM_RANDOM_POST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        } catch (\Exception $e) {

            print 'Problem with primary initiation of InstagramRandomPost script. Error description: ';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_INIT_INSTAGRAM_RANDOM_POST [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        }


        //$InstRepo = new InstagramRepository();
       // $InstRepo->setAccessToken($InUserToken[0]->instagram_access_token);
//------GET FROM EVERY PIXEL

        try {

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INSTAGRAM_RANDOM_POST_EXECUTING <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
            $ch = curl_init();
            $what = $param->keywords;
            $curl_e = "https://everypixel.com/search?q=".$what."&page=1&media_type=0&stocks_type=free";
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL,
                $curl_e
            );
            $content = curl_exec($ch);
            $matches = NULL;
            $pattern = '/(?:http|https|ftp):\/\/\S+\.(?:jpg|jpeg)/';
            preg_match_all ($pattern, $content, $matches);
            $jpeg_count = count($matches[0]);
            $client = new instagramUploader();
            $login = $client->login($param->login, $param->password);
            if ($login)
            {
                $log->WriteLog($param->login,$param->password,$param->keywords,$param->count,"DONE_LOGIN_INSTAGRAM");
                for($i = 0; $i<$param->count; $i++) {
                    $ind_ = rand(0, $jpeg_count);
                    //Get the file
                    $content = file_get_contents($matches[0][$ind_]);
                    //Store in the filesystem.
                    $fp = fopen("/tmp/" . $user_id . $source_acc . $i . ".jpg", "w");
                    fwrite($fp, $content);
                    fclose($fp);
                        $media_id = $client->upload_image("/tmp/" . $user_id . $source_acc . $i . ".jpg");
                        if ($media_id) {
                            $manipulate = $client->configure_image($media_id, $param->keywords);
                            if ($manipulate) {
                                echo 'Your image has been uploaded. Image id: ' . $manipulate->id;
                                $log->WriteLog($param->login,$param->password,$param->keywords,"Image","DONE_POST_INSTAGRAM");

                            }
                        }
                        shell_exec("rm "."/tmp/" . $user_id . $source_acc . $i . ".jpg");
                    $log->WriteLog($param->login,$param->password,$param->keywords,"","DONE_MESSAGE_INSTAGRAM");
                }
            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_INSTAGRAM_RANDOM_POST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $log->WriteLog($param->login,$param->password,$param->keywords,$param->count,"DONE_KEYWORD_INSTAGRAM");
            
        } catch (\Exception $e) {

            print 'Problem when posting to Instragram. Error description: ';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_INSTAGRAM_RANDOM_POST [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        }
       /* foreach($matches[0] as $match)
        {
            echo "<img src=\"$match\" alt=\"альтернативный текст\">";
            echo "\n";



        }*/


    }

    /**
     * [Conf description]
     * @param [type] $token  [description]
     * @param [type] $script [description]
     */
    public static function Conf($token,$script){

        try {
            
            $result = "";
            $script_name = $script;
            $i = 0;

            $Script = new User_scripts();
            $Script =  $Script::getParameters($script_name);
            $scriptParameters= json_decode($Script[0]->script_parameters);
            $result .= '<div class="row">';
            $result .= '<div class="col-md-12">';
            $result .= '<div class="panel panel-default">';

            /* Close Button */
            $result .= '<div class="panel-heading">Script parameters';
            $result .= '<button type="button" onclick="save_action_data_to_session();close_popup()" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $result .= '</div>';
            
            $result .= '<div class="panel-body" id="add_script_parameters">';
            $result .= '<p> Here parameters to your script. Enter please data.</p>';
            foreach ($scriptParameters as $key => $value) {
                $result .= '<div class="row bottom10px">';
                $result .= '<div class="form-group">';
                $result .= '<div class="col-md-4">';
                $result .= '<label for="script_param_' . $i . '" id="script_label_param_' . $i . '" class="col-md-4 actions-control-label text-right">' . $key . '</label>';
                $result .= '</div>';
                $result .= '<div class="col-md-6">';
                $result .= '<input type="text" id="script_param_' . $i . '" class="form-control" name="script_param_' . $i . '" placeholder="Type here value please" value="' . $value . '" required>';
                $result .= '</div>';
                $result .= '</div>';
                $result .= '</div>';
                $i++;
            }
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<br />';
            $result .= '<div class="row">';
            $result .= '<div class="col-md-12">';
            $result .= '<div class="panel panel-default">';
            $result .= '<div class="panel-heading">Description</div>';
            $result .= '<div class="panel-body" >';
            $result .= '<p id="d">' . $Script[0]->script_info . '</p>';

            $result .= '<input type="hidden" id="value_script_target" value="' . $Script[0]->script_target . '">';
            $result .= '</div>';



            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<br />';

            $result .= '<center>';
            $result .= '<div class="panel-body">';
            $result .= '<div class="btn-group" data-toggle="buttons" id="BtnCenter">';
            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="save_action_data_to_session();close_popup()">';
            $result .= '<input type="radio" name="options_shedule"> Save And Next';
            $result .= '</label>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</center>';
            $result .= '<br />';


            session(['script_target' => $Script[0]->script_target]);
            unset($Script);
            return $result;

        } catch (\Exception $e) {
            
            print 'Error: ';
            print $e->getMessage();
            print_r('<br>');
            $result .= '<center>';
            $result .= '<div class="panel-body">';
            $result .= '<div class="btn-group" data-toggle="buttons" id="BtnCenter">';
            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="close_popup()">';
            $result .= '<input type="radio" name="options_shedule">Close';
            $result .= '</label>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</center>';
            print_r($result);
            
        }
            
    }

}