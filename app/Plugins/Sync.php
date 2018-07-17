<?php
/**
 * User: Maks Glebov
 * Date: 30.03.17
 * 
 * DIR: /var/www/aimee/app/Plugins
 */
namespace App\Plugins;

use App\PluginInterfase;
use Illuminate\Support\Facades\DB;
use App\Console\Commands\Twitter;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Repositories\TwitterRepository;
use App\Repositories\FacebookRepository;
use \Facebook\FacebookSDKException;
use \Facebook\FacebookRedirectLoginHelper;
use App\User_Google_accounts;
use App\Repositories\GoogleRepository;
use App\Repositories\InstagramRepository;
use App\User_Instagram_Accounts;
use App\Repositories\LinkedInRepository;
use App\Repositories\AimeeLoggerRepository;
use Illuminate\Http\Request;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_scripts;
use App\User_LinkedIn_Accounts;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use \Facebook\Authentication\AccessToken;
use App\Http\Controllers\CrossSheringController;
use App\Http\Controllers\ManageUserFacebookAccountsController;
use App\Http\Requests\FacebookRequest;



/**
 * maks_2
 * 
 * @todo
 * - чтобы для синхронизации в сравнение брались только сообщения по дате/времени такие же как и 
 *     синхронизируемые;
 * - реализвать параметры - сколько раз повторять синхронизацию(или бесконечно), через какой 
 *     промежуток времени выполнять синхронизацию;
 * - разобраться в особенностях размещения сообщений для разных соцсетей - сообщения должны 
 *     отображаться одинаково
 * - в целом улучшить архитектуру кода, можно сделать директорию для этого плагина, чтобы затем
 *     лучше организовать архитектуру, упростить код, отделить данные от логики

 */
class Sync
{
    private static $logger;

    public static function Sync()
    {
        self::$logger = new AimeeLoggerRepository();
    }
    /**
     * [Run description]
     * @param [type] $run_array [description]
     */
    public static function Run($run_array) {

        $err = false;
        $source_acc = '';
        
        try {
            self::Sync();

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            self::$logger->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_INIT_LIST_RETWEETER <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");


            // return self::synchronize($user_id, $run_array);
            $notSynced = self::synchronize($user_id, $run_array);
            
            self::$logger->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_LIST_RETWEETER_RUN <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            
           /* if (!empty($notSynced)) {
                // $noSynced = implode(', ', $noSynced);
                echo('Synchronization was <span class="text-success">successfully completed</span>, but the following social networks <span class="text-info">were not synchronized</span>, because they already have a duplicates of synchronization data: '. $notSynced);
            } else {
                echo "<h4>Synced</h4>";
            }*/

        } catch (\Exception $e) {
            
            $err = $e->getMessage() . $e->getLine();
            print 'An error occurred when finishing Sync script: ';
            print $e->getMessage();
            print '<br>';
            self::$logger->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_SCRIPT_SYNC_INIT [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        } finally {

            if ($err) {
                print '<h3>Sync finished with error(s): <span class="text-danger">'. $err .'</span></h3>';
            } else {
                // print_r($err);
                print '<h3 class="text-info">Accounts synchronized succesfully</h3>';
            }

        }


    }

    /**
     * [synchroPost description]
     * @param  [type] $result [description]
     * @param  [type] $to     [description]
     * @return [type]         [description]
     */
    public static function synchroPost($result, $to)
    {

        $user_id = Auth::id();

        /*
        Array
        (
            [0] => Array
                (
                    [socsite] => Google
                    [id] => 1095204s3511196816667
                    [name] => severin2891@gmail.com
                )

            [1] => Array
                (
                    [socsite] => Twitter
                    [name] => Red_Rain91
                )

        )

         */
        

        $postTo = function ($toAcc = 'empty') use ($user_id, $result)
        {

            array_walk_recursive($toAcc, 'trim');
            $zeroSynced = [];

            switch ($toAcc['socsite']) 
            {

                /**
                 * To Instagram
                 * 
                 * Cant post
                 */
                case 'no_Instagram':

                    // $instAccounts = User_Instagram_Accounts::getInstagramAccounts( $user_id );
                    // $inst = new InstagramRepository();

                    break;

                /**
                 * To LinkedIn
                 * 
                 * Cant post
                 */
                case 'no_LinkedIn':

                    // $linkedInAccs = User_LinkedIn_Accounts::getLinkedInAccounts( $user_id );
                    // $linkedIn = new LinkedInRepository();

                    break;
                

                /**
                 * To Twitter
                 */
                case 'Twitter':


                    $myTweet = new TwitterRepository();
                    $user_keys = $myTweet->GetUserKeys($user_id, $toAcc['name']);
                    // $toTwData = json_decode( $myTweet->GetMyTwit($user_keys['user_key'], $user_keys['user_key_secret'], $toAcc['name'], 200) );

                    // for debug:
                    // print_r('<p>ToTwData:</p>');
                    // var_dump($toTwData);
                    // // exit;

                    $total = 0;
                    foreach ($result as $key => $data) {

                        $fromAcc = explode('/:/', $key, 2);
                        $socNet = $fromAcc[0];

                        /**
                         * To Twitter From Twitter $data
                         */
                        if (stristr($socNet, 'Twitter')) {

                            // $twitterUserName = trim(str_replace("Twitter", "", $key), " \t\n\r\0\x0B_");
                            $twitterUserName = $fromAcc[1];

                            $total = 0;
                            foreach ($data as $message) {

                                $result = true;
                                try {
                                    $text = htmlspecialchars_decode($message['text'], ENT_HTML5);

                                    /**
                                     * There are I decided to start to make checking duplicate messages, 
                                     * but it not necessary
                                     */
                                    /*foreach ($toTwData as $toKey => $toVal) {
                                        if ($toVal->text == $text) {
                                            print_r('$toVal->text == $text<br>');
                                            print_r($toVal);
                                            print_r($text);
                                        }
                                    }*/

                                    $result = $myTweet->syncPostTweet($user_keys['user_key'], $user_keys['user_key_secret'], $text, ENT_HTML5);

                                    if ($result != null && @$result->id && @$result->text) {
                                        print_r('<b>Twitter->syncPost()->Twitter <span class="text-success">Successfully</span> Sent Data: </b>');
                                        echo "Message \"" . strip_tags( $result->text ) . "\" with id:" . $result->id . " succesfully posted<br>";
                                        $total++;
                                    } else {
                                        print_r('<b>Twitter->syncPost()->Twitter <span class="text-danger">Failed</span> Sending Data: </b>');
                                        echo "Message NOT posted<br>";
                                    }
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                    throw $e;
                                }


                            }
                            
                            if ($total <= 0) {
                                echo '<h5><span class="text-warning">No messages have been sent</span> from Twitter:',$twitterUserName,' account to Twitter:',$toAcc['name'],' account. Maybe they all are duplicates</h5>';
                                $zeroSynced[] = "Twitter-Twitter";
                                // array_push($zeroSynced, "Twitter-Twitter");
                            }

                        }

                        /**
                         * 
                         * To Twitter From Facebook $data
                         * 
                         */
                        if (stristr($socNet, 'Facebook')) {

                            $facebookUserName = $fromAcc[1];
                            // $facebookUserName = trim(str_replace("Facebook", "", $key), " \t\n\r\0\x0B_");

                            $userTimeline = json_decode( $myTweet->GetMyTwit($user_keys['user_key'], $user_keys['user_key_secret'], $toAcc['name']) );

                            // For debug:
                            /*print_r('$userTimeline, To Twitter Data. Line:' . __LINE__);
                            dump($userTimeline);    
                            print_r('$data, From Facebook Data (to Twitter). Line:' . __LINE__);
                            dump($data);
                            break 2;
                            exit;*/
                            // echo '<span class="text-info">IN THE To Twitter From Facebook</span> <b>'. __LINE__ .'</b><br>';
                            // print_r($data);
                            
                            foreach ($data as $message) {

                                // echo '<span class="text-info">1 level start</span> <b>'. __LINE__ .'</b><br>';

                                $text = (@$message['message']) ? 
                                            $message['message'] : 
                                            ((@$message['story']) ? 
                                                $message['story'] : '');


                                $link = (@$message['link']) ? $message['link'] : '';

                                $linkLenght = 0;
                                if ($link) {
                                    $linkLenght = strlen($link);
                                    $textLength = 140 - 1 - $linkLenght;
                                    $textLength = (!$textLength)? 0 : $textLength;
                                    $postMessage = substr($text, 0, $textLength) . " " . $link;    
                                } else {
                                    $postMessage = substr($text, 0, 140); 
                                }

                                /* Comparisons between message $fromTwitterMsg from Twitter and $fromFbToTwMsg Facebook messages*/
                                foreach ($userTimeline as $tkey => $userTweet) {

                                    // echo '<span class="text-info">2 level start: comparison</span> <b>'. __LINE__ .'</b><br>';

                                    $fromTwitterMsg = substr($userTweet->text, 0, 40);
                                    $fromFbToTwMsg = substr($postMessage, 0, 40);

                                    // print_r('->/fromTwitterMsg: ' . $fromTwitterMsg . '<br>');
                                    // print_r('<-/fromFbToTwMsg: ' . $fromFbToTwMsg . '<br>');
                                    // var_dump($fromTwitterMsg == $fromFbToTwMsg);
                                    
                                    if ($fromTwitterMsg == $fromFbToTwMsg) {
                                        print_r("Message \"" . $fromFbToTwMsg . "\" has already posted. <span class='text-danger'>It was skipped</span> <br>");
                                        // echo '<span class="text-info">2 level in the IF -> continue 2</span> <b>'. __LINE__ .'</b><br>';
                                        
                                        continue 2;
                                    }

                                    // echo '<span class="text-info">2 level end: finish comparison</span> <b>'. __LINE__ .'</b><br>';


                                }

                                try {

                                    // echo '<span class="text-info">1 level in the center: try-syncPostTweet-catch</span> <b>'. __LINE__ .'</b><br>';

                                    // 123
                                    $result = $myTweet->syncPostTweet($user_keys['user_key'], $user_keys['user_key_secret'], $postMessage);
                                    
                                    if ($result != null && @$result->id && @$result->text) {
                                        print_r('<b>Facebook->syncPost()->Twitter <span class="text-success">Successfully</span> Sent Data: </b>');
                                        echo "Message \"" . strip_tags( $result->text ) . "\" with id:" . $result->id . " succesfully posted<br>";
                                        $total++;
                                    } else {
                                        print_r('<b>Facebook->syncPost()->Twitter <span class="text-danger">Failed</span> Sending Data: </b>');
                                        echo "Message \"" . $postMessage . " NOT posted<br>";
                                    }

                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                    throw $e;
                                }

                                // echo '<span class="text-info">1 level in the END</span> <b>'. __LINE__ .'</b><br>';


                            }

                            // echo '<span class="text-info">OUT OF THE To Twitter From Facebook</span> <b>'. __LINE__ .'</b><br>';
                            if ($total <= 0) {
                                echo '<h5><span class="text-warning">No messages have been sent</span> from Facebook:',$facebookUserName,' to Twitter:',$toAcc['name'],' account. Maybe they all are duplicates</h5>';
                                $zeroSynced[] = 'Facebook-Twitter';
                                // array_push($zeroSynced, "Facebook-Twitter");
                            }

                        }

                    }

                    if ($total == 1) {
                        echo "<h4>" . $total . " message has been synchronized</h4><br>";
                    } elseif ($total >= 2) {
                        echo "<h4>" . $total . " messages have been synchronized</h4><br>";
                    } 

                break;


                /**
                 * To Facebook
                 */
                case 'FaceBook':

                    $fb = new FacebookRepository();
                    $fbAcc = DB::table('user_facebook_accounts')
                        ->where([ ['id_user', '=', $user_id], ['user_facebook_login', '=', $toAcc['name']] ])
                        ->first();

                    foreach ($result as $key => $data) {

                        $fromAcc = explode('/:/', $key, 2);
                        $socNet = $fromAcc[0];

                        $toFbData = $fb->getFeedBodyAsArray($fbAcc->facebook_access_token); // feed from to-Fb


                        /**
                         * 
                         * From Twitter To Facebook
                         * 
                         */
                        if (stristr($key, 'Twitter')) {

                            $total = 0;

                            $twitterUserName = $fromAcc[1];
                            // $twitterUserName = trim(str_replace("Twitter", "", $key), " \t\n\r\0\x0B_");

                            // 123
                            // maks_2: for debug
                            /*print_r('$toFbData, To Facebook Data. Line:' . __LINE__);
                            dump($toFbData);    
                            print_r('$data, From Twitter Data (to Facebook). Line:' . __LINE__);
                            dump($data);
                            break 2;
                            exit; */ 
                            
                            // echo '<span class="text-info">IN THE To Facebook From Twitter</span> <b>'. __LINE__ .'</b><br>';

                            $data; // FEED FROM TWITTER
                            $toFbData; // FEED FROM TO-FB

                            foreach ($data as $message) {
                                // echo '<span class="text-info">In 1 level begin</span> <b>'. __LINE__ .'</b><br>';

                                // $twText = htmlspecialchars_decode($message['text'], ENT_HTML5);
                                $twText = '';
                                

                                foreach ($toFbData['data'] as $fbMsg) {

                                    $twTextShort = '';
                                    $fbTextShort = '';

                                    // echo '<span class="text-info">In 2 level begin</span> <b>'. __LINE__ .'</b><br>';
                                    $fbText = (@$fbMsg['message']) ? 
                                            $fbMsg['message'] : 
                                            ((@$fbMsg['story']) ? 
                                                $fbMsg['story'] : '');

                                    $link = (@$fbMsg['link']) ? $fbMsg['link'] : false;

                                    $linkLenght = 0;
                                    if ($link) {
                                        $linkLenght = strlen($link);
                                        $textLength = 140 - 1 - $linkLenght;
                                        $textLength = (!$textLength)? 0 : $textLength;
                                        $fbTextShort = substr($fbText, 0, $textLength) . " " . $link;    
                                    } else {
                                        $fbTextShort = substr($fbText, 0, 140); 
                                    }            
                                    
                                    $pattern = '(https?\:\/\/t\.co.[a-z0-9.?=+_-]*[^\s]*)';
                                    $count_matches = preg_match_all($pattern, $message['text'], $preg_matches);

                                    $matches = [];
                                    foreach ($preg_matches as $key => $value) {
                                        $matches += $value;
                                    }

                                    // dump($message);
                                    if (@$message['expanded_urls'] && @$message['text']) {
                                        
                                        $twText = str_replace($matches, $message['expanded_urls'], $message['text']); // 140

                                        // print_r('Previous $twText: <br>');
                                        // print_r($message['text'] . '<br>');
                                        // print_r('Result $twText with link: ');
                                        // print_r($twText);

                                        $fullFbText = $fbTextShort;
                                        // $fbText = trim( htmlspecialchars_decode($fbText, ENT_HTML5) );
                                        $twTextShort = substr($twText, 0, 40);
                                        $fbTextShorted = substr($fbTextShort, 0, 40);
                                        // print_r('$twTextShort FromTwitter->text: ' . $twTextShort . ' <b>'. __LINE__ .'</b><br>');
                                        // print_r('$fbTextShort  ToFacebook->text: ' . $fbTextShort . ' <b>'. __LINE__ .'</b><br>');
                                        // print_r('$fullFbText ToFacebook->FulltextLikeTw: ' . $fullFbText . ' <b>'. __LINE__ .'</b><br>');
                                        // print_r('$twText FromTwitter->Fulltext: ' . $twText . ' <b>'. __LINE__ .'</b><br>');
                                        // var_dump($twTextShort == $fbTextShort);
                                    
                                    } else {
                                        
                                        $twText = $message['text'];

                                        // print_r('Previous $twText: <br>');
                                        // print_r($message['text'] . '<br>');
                                        // print_r('Result $twText with link: ');
                                        // print_r($twText);

                                        $fullFbText = $fbTextShort;
                                        // $fbText = trim( htmlspecialchars_decode($fbText, ENT_HTML5) );
                                        $twTextShort = substr($twText, 0, 40);
                                        $fbTextShorted = substr($fbTextShort, 0, 40);


                                    }

                                    
                                    /* maks_2: From Twitter message To Facebook message comparison  */
                                    if ($twTextShort == $fbTextShorted) {
                                        echo ("Message \"" . $fbTextShorted . "\" has already posted. <span class='text-danger'>It was skipped</span> <br>");
                                        // echo '<span class="text-info">In 2 level in IF -> continue 2</span> <b>'. __LINE__ .'</b><br>';
                                        // print_r('Comparison 1<br>');

                                        continue 2;
                                    }



                                    // echo "Link length: " . $linkLenght . "<br>";
                                    /*if ($linkLenght >= 100) {
                                        echo "Link length is more than 100 chars. It cant be synchronized with Facebook and <span class='text-danger'>was skipped</span> <br>";
                                        // echo '<span class="text-info">In 2 level in IF-link-length -> continue 2</span> <b>'. __LINE__ .'</b><br>';
                                        $linkLenght = 0;

                                        print_r('Comparison 2<br>');

                                        continue 2;
                                    }*/

                                    // echo '<span class="text-info">In 2 level end</span> <b>'. __LINE__ .'</b><br>';


                                }

                                $twText = (!$twText) ? $message['text'] : $twText;
                                // print_r($twText);

                                // print_r('Near syncPost <br>');


                                $arr = [
                                    // 'link' => htmlspecialchars_decode($message['tweet_link'], ENT_HTML5),
                                    // 'title' => '$item->getTitle()', 
                                    'message' => $twText,
                                ];

                                // echo '<span class="text-info">In 1 level center (after 2 level end)</span> <b>'. __LINE__ .'</b><br>';

                                // print_r('$message[]: <br>');
                                // print_r($message);

                                try {
                                    // print_r('SyncPost begin <br>');

                                    $result = $fb->syncPost( $arr, $fbAcc->facebook_access_token );
                                    if ($result) {
                                        print_r('<b>Twitter->syncPost()->Facebook <span class="text-success">Successfully</span> Sent Data: </b><br>');
                                        print_r($arr);
                                        $total++;
                                    } else {
                                        print_r('<b>Twitter->syncPost()->Facebook <span class="text-danger">Failed</span> Sending Data: </b><br>');
                                        print_r($arr);
                                    }
                                    
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                    throw $e;
                                }
                                // echo '<span class="text-info">In 1 level end (after try-syncPost-catch)</span> <b>'. __LINE__ .'</b><br>';

                            }

                            // echo '<span class="text-info">OUT OF THE To Facebook From Twitter</span> <b>'. __LINE__ .'</b><br>';

                            if ($total <= 0) {
                                echo '<h5><span class="text-warning">No messages have been sent</span> from Twitter:',$twitterUserName,' to Facebook:',$toAcc['name'],' account. Maybe they all are duplicates<h5>';
                                $zeroSynced[] = 'Twitter-Facebook';
                                // array_push($zeroSynced, "Twitter-Facebook");

                            }

                            if ($total == 1) {
                                echo "<h4>" . $total . " message has been synchronized</h4><br>";
                            } elseif ($total >= 2) {
                                echo "<h4>" . $total . " messages have been synchronized</h4><br>";
                            }
                             
                        }

                        

                        // --------------
                        /**
                         * To Facebook From Facebook
                         */
                        $toFbData = $fb->getFeedBodyAsArray($fbAcc->facebook_access_token); // feed from toFacebook
                        if (stristr($key, 'Facebook')) {

                            $facebookUserName = $fromAcc[1];
                            // $facebookUserName = trim(str_replace("Facebook", "", $key), " \t\n\r\0\x0B_");

                            // $data; // from Facebook
                            // print_r('In Facebook <br>');
                            // print_r($key);
                            // print_r($data);
                            // print_r('To Facebook: <br>');
                            // print_r($toFbData); // posts from ToFacebook
                            // exit;

                            $total = 0;

                            foreach ($data as $message) {

                                $text = (@$message['message']) ? 
                                            $message['message'] : 
                                            ((@$message['story']) ? 
                                                $message['story'] : '');
                                $text = htmlspecialchars_decode($text, ENT_HTML5);
                                $link = htmlspecialchars_decode( 
                                        (@$message['link']) ? $message['link'] : ''
                                    );

                                $sendData = [
                                    'link' => $link,
                                    // 'title' => '$item->getTitle()', 
                                    'message' => $text,
                                ]; 

                                $sendData; // from Facebook one pocket
                                $toFbData; // to Facebook full array

                                // For debug:
                                // print_r('from Facebook one pocket: <br>');
                                // print_r($sendData);
                                // print_r('to Facebook full array: <br>');
                                // print_r($toFbData);

                                /**
                                 * @todo: work incorrect. undone
                                 */
                                /**
                                 * Comparisons between fromFbData and toFbData
                                 * 
                                 */
                                foreach ($toFbData['data'] as $x => $v) {

                                    // print_r('in toFbData[data]');
                                    // toFbText - has message or story type
                                    $toFbText = (@$v['message']) ? 
                                                $v['message'] : 
                                                ((@$v['story']) ? 
                                                    $v['story'] : false);
                                    $toFbText = htmlspecialchars_decode($toFbText, ENT_HTML5);
                                    // toLink - has only link type
                                    $toLink = htmlspecialchars_decode( 
                                        (@$v['link']) ? $v['link'] : false
                                    );

                                    // For debug:
                                    // print_r('$sendData[message]: ' . $sendData['message'] . '<br>');
                                    // print_r('toFbText: ' . $toFbText . '<br>');
                                    // print_r('$sendData[link]: ' . $sendData['link'] . '<br>');
                                    // print_r('$toLink: ' . $toLink . '<br>');

                                    if (($sendData['message'] == $toFbText && $toFbText !== false)) {
                                        print_r("Message \"" . $toFbText . "\" has already posted. <span class='text-danger'>It was skipped</span> <br>");
                                        // exit from Comparison loop and PostMessage loop without posting:
                                        continue 2; 
                                    } elseif (!$toFbText && $sendData['link'] == $toLink && $toLink !== false) {
                                        print_r("Link \"" . $toLink . "\" has already posted. <span class='text-danger'>It was skipped</span> <br>");
                                        // exit from Comparison loop and PostMessage loop without posting:
                                        continue 2;
                                    }
                                }


                                /**
                                 * Reposting
                                 */
                                try {
                                    
                                    $result = $fb->syncPost( $sendData, $fbAcc->facebook_access_token );

                                    if ($result) {
                                        print_r('<b>Facebook->syncPost()->Facebook <span class="text-success">Successfully</span> Sent Data: </b><br>');
                                        print_r($sendData);
                                        ++$total;
                                    } else {
                                        print_r('<b>Facebook->syncPost()->Facebook <span class="text-danger">Failed</span> Sending Data: </b><br>');
                                        print_r($sendData);
                                    }
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                    throw $e;
                                }


                            }

                            if ($total <= 0) {
                                echo '<h5><span class="text-warning">No messages have been sent</span> from Facebook:',$facebookUserName,' to Facebook:',$toAcc['name'],' account. Maybe they all are duplicates</h5>';
                                $zeroSynced[] = 'Facebook-Facebook';
                                // array_push($zeroSynced, "Facebook-Facebook");

                            }

                        }
                    }

                    // exit;

                    break;



                case 'no_Google':

                    
                    
                    break;

                default:

                    // $result[] = ['No social network was found'];
                    break;
                    
            } // end switch()

            return $zeroSynced;

        }; // end postTo()


        /**
         * Executing function postTo()
         */
        $noSynced = [];
        foreach ($to as $toAcc) {
            $noSynced[] = $postTo($toAcc);
        }

        return $noSynced;

    }
// */


    /**
     * [synchroGet description]
     * @param  array  $from [description]
     * @param  array  $to   [description]
     * @return [type]       [description]
     */
    public static function synchroGet(array $from)
    {

        $user_id = Auth::id();

        $getPostsFrom = function ($acc = 'empty') use ($user_id)
        {
            
            array_walk_recursive($acc, 'trim');

            $instagramResult = [];
            $linkedinResult = [];
            $twitterResult = [];
            $facebookResult = [];
            $googleResult = [];
            $result = [];


            switch ($acc['socsite']) {

                case 'no_Instagram':

                    $instAccounts = User_Instagram_Accounts::getInstagramAccounts( $user_id );
                    $inst = new InstagramRepository();

                    /**
                     * @todo maks_2: Instagram undone -> cant get posts from Instagram
                     */

                    /*try {
                        print_r( $inst->getUserMedia('self') );
                    } catch (Exception $e) {
                        return  $e->getMessage();
                    }
                    
                    cant get posts from Instagram...
                    .
                    .
                    .

                    */
                    
                    $result['Instagram/:/' . trim($acc['name'])] = $instagramResult;


                    break;

                case 'no_LinkedIn':

                    /**
                     * @todo maks_2: LinkedIn undone -> cant get posts from LinkedIn
                     */

                    $linkedInAccs = User_LinkedIn_Accounts::getLinkedInAccounts( $user_id );
                    $linkedIn = new LinkedInRepository();

                    foreach ($linkedInAccs as $acc) {
                        $arr = $linkedIn->getFeedBodyAsArray( $acc->facebook_access_token );
                        $linkedinResult[ 'data' ] = $arr['data'];
                    }
                    

                    /*

                    cant get posts from LinkedIn...
                    .
                    .
                    .

                    */


                    $result['LinkedIn/:/' . trim($acc['name'])] = $linkedinResult;

                    break;
                
                /**
                 * Get from Twitter
                 */
                case 'Twitter':

                    /*$twAcc = User_twitter_accounts::getTwitterAccounts($user_id);
                    $twAcc = DB::table('user_twitter_accounts')
                        ->where( [ ['id_user', '=', Auth::id()], ['user_twitter_login', '=', $acc['name']] ] )
                        ->get();*/
                    $myTweet = new TwitterRepository();
                    $user_keys = $myTweet->GetUserKeys($user_id, $acc['name']);
                    // max 200 tweets:
                    $twits = json_decode( $myTweet->GetMyTwit($user_keys['user_key'], $user_keys['user_key_secret'], $acc['name']) );

                    foreach ($twits as $twit) {

                        $arr = [];
                        
                        $arr['id'] = trim( $twit->id );
                        $arr['text'] = trim( $twit->text );
                        $arr['tweet_link'] = 'https://twitter.com/' . trim( $acc['name'] ) . '/status/' . trim( $arr['id'] );

                        $i = 0;
                        /* Check extended entitites */
                        if (@$twit->extended_entities->media) {
                            foreach (@$twit->extended_entities->media as $item) {

                                $arr['ext_media_urls'][] = trim( $item->media_url );
                                
                            }
                        }

                        $i = 0;
                        /* Check all entities */
                        if (@$twit->entities->hashtags) {
                            foreach (@$twit->entities->hashtags as $hashtag) {

                                $arr['hashtags'][] = trim( $hashtag->text );
                                
                            }
                        }

                        $i = 0;
                        if (@$twit->entities->urls) {
                            foreach (@$twit->entities->urls as $url) {

                                $arr['expanded_urls'][] = trim( $url->expanded_url );
                                
                            }
                        }

                        $i = 0;
                        if (@$twit->entities->media) {
                            foreach (@$twit->entities->media as $item) {

                                $arr['media_urls'][] = trim( $item->media_url );
                                
                            }
                        }

                        // 123

                        unset($i);

                        // dump($arr);

                        $twitterResult[] = $arr;
                        
                        // }

                        /*
                            +id
                            +id_str
                            +text
                            entities[0]->
                                +user_mentions[0]->
                                    screen_name
                                    name
                                    id
                                    id_str
                                    indicies
                                    ...
                            +?media_url
                            ??video
                            ??gif
                            ??hashtags
                            ??List
                        */

                    }

                    $result['Twitter/:/' . trim($acc['name'])] = $twitterResult;
                        
                    break;

                case 'FaceBook':

                    // $fbAcc = User_facebook_accounts::getFacebookAccounts( $user_id );
                    $fbAcc = DB::table('user_facebook_accounts')
                        ->where([ ['id_user', '=', $user_id], ['user_facebook_login', '=', $acc['name']] ])
                        ->get();
                    $fb = new FacebookRepository();

                    $x = 0;
                    foreach ($fbAcc as $oneAcc) {
                        // can get max 100 posts:
                        $arr = $fb->getFeedBodyAsArray( $oneAcc->facebook_access_token );
                        $facebookResult = $arr['data'];
                        // var_dump($arr);
                        // $facebookResult[ $oneAcc->id_user_facebook ] = $arr['data'];
                        // $facebookResult[ $x . '___' . $oneAcc->id_user_facebook ]['data_' . $x++] = $arr['data'];
                    }
                    
                    // dump($facebookResult);

                    unset($x);

                    $result['Facebook/:/' . trim($fbAcc[0]->user_facebook_login)] = $facebookResult;
                    
                    break;

                case 'no_Google':

                    /*$gMailAccs = User_Google_accounts::getGoogleAccounts( $user_id );
                    $gMail = new GoogleRepository();
                    $gMail->listMessages();*/

                    $result[] = ['Google is not supported now'];
                    
                    break;

                default:

                    print_r('[Info: ' . $acc['socsite'] . ' accounts are not supported now]<br>');
                    // $result[] = ['No one social network account was found for ' . $acc['socsite']];
                    
                    break;

            }

            return $result;
        };

        $result = [];

        if (empty( $from ) || count($from) < 1) {
            throw new \Exception('<span class="text-danger">List of origin accounts is empty</span>');
            return false;
        }

        foreach ($from as $account) {
            $result += $getPostsFrom($account);
        }

        return $result;

    }



    /**
     * [curlExecute description]
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public static function curlExecute($url) {

        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);

        if( ! $contents = curl_exec($c))
        {
            trigger_error(curl_error($c));
        }
        
        $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
        curl_close($c);
        
        if ($contents) 
            return $contents;
        else 
            return false;

    }

    


    /**
     * [checkFbToken description]
     * @param  [type] $user_id             [description]
     * @param  [type] $user_facebook_login [description]
     * @return [type]                      [description]
     */
    public static function checkFbToken($user_id, $user_facebook_login)
    {
        
        /* Definitions */
        $app_id = env('FACEBOOK_CLIENT_ID');
        $decoded_response = [];

        $curl_get_file_contents = function ($url) {

            $c = curl_init();
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_URL, $url);

            if( ! $contents = curl_exec($c))
            {
                trigger_error(curl_error($c));
            }
            
            $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
            curl_close($c);
            
            if ($contents) 
                return $contents;
            else 
                return false;
 
        };
        $tokens = [];


        /* Actions */
        $fbAcc = DB::table('user_facebook_accounts')
                        ->where([ ['id_user', '=', $user_id], ['user_facebook_login', '=', $user_facebook_login] ])
                        ->get();

        foreach ($fbAcc as $account) {

            $actual_token = self::refreshIfNeed($account->facebook_access_token);
            $tokens[] = $actual_token;

            // $response->user_facebook_login = $account->user_facebook_login;
            // $response->id_user_facebook = $account->id_user_facebook; 
            // $response->id_user = $account->id_user;
            // $decoded_response[] = $response;
        }

        /* Actual tokens. Already saved to DB */
        return $tokens;

    }



    /**
     * [refreshIfNeed description]
     * @param  [type] $old_token [description]
     * @return [type]            [description]
     */
    public static function refreshIfNeed($old_token) {

        // Critical quantity of seconds to refresh the token:
        $critical = 86400;
        $id_user = Auth::id();
        
        $token_url = "https://graph.facebook.com/oauth/access_token_info?client_id="
                . env('FACEBOOK_CLIENT_ID') . "&access_token=" . $old_token;
        $response = self::curlExecute( $token_url );
        $response = json_decode($response);

        $UserFacebookAccounts = new User_facebook_accounts();
        $account = $UserFacebookAccounts::getFacebookAccountByToken($old_token);
        $response->id_user_facebook = $account->id_user_facebook;
        $response->user_facebook_login = $account->user_facebook_login;
        
        // if $info->expires_in exists:
        if (@$response->expires_in) {
            $needRefresh = $critical > $response->expires_in; // diff in seconds
        } else {
            $needRefresh = true;
        }

        if ($needRefresh) {
            // If token need refresh
            $token_2_url = "https://graph.facebook.com/oauth/access_token?client_id=". trim( env('FACEBOOK_CLIENT_ID') ) ."&client_secret=". trim( env('FACEBOOK_CLIENT_SECRET') ) ."&grant_type=fb_exchange_token&fb_exchange_token=" . $old_token;

            $emptyFacebookAccount = $UserFacebookAccounts::checkFAcebookAccount($response->id_user_facebook);

            if (!$emptyFacebookAccount) {

                $response_2 = self::curlExecute( $token_2_url );
                $response_2 = json_decode($response_2);
                
                $decoded_response[] = $response_2;
                $result = $UserFacebookAccounts::updateFacebookAccountToken($old_token, $response_2->access_token, $response_2->expires_in);

                if ($result) {
                    return $response_2->access_token;
                } else {
                    return $old_token;
                }

            } else {
                
                $response->aimeeTokenMsg = 'This account is not in the Aimee: ' . $response->user_facebook_login. '<br>';
                $decoded_response[] = $response;
                // print_r($decoded_response);
                echo $response->aimeeTokenMsg;

                return $old_token;

            }

        } else {

            // If token not need refresh
                // $response->aimeeTokenMsg = 'Refresh not need for: ' . $response->user_facebook_login . '<br>';
            $decoded_response[] = $response;
            // print_r($decoded_response);
            // echo $response->aimeeTokenMsg;

            return $old_token;

        }

    }



    /**
     * [scriptListRetweet description]
     * @param  [type] $user_id         [description]
     * @param  [type] $source_account [description]
     * @param  [type] $keywords        [description]
     * @param  [type] $list            [description]
     * @return [type]                  [description]
     */
    private static function synchronize($user_id, $run_array)
    {

        try {

            self::Sync();
            $accounts = [];
            $targets = [];
            $user_id = Auth::id();


            /**
             * @todo : maks_2 Reparse Source and Target accounts
             */
            dd($run_array);


            foreach ($run_array['all_user_accounts'] as $key => $account) {
                
                if (stristr($account, ' ID')) {

                    $p = '/\\\\Name: (?P<name>.+) ID: (?P<id>.+)/';
                    preg_match($p, $account, $matches);

                    $accounts[] = [
                        'socsite' => strstr($account, '\\\\', true),
                        'name' => $matches['name'],
                        'id' => $matches['id'],
                    ];
                    
                } else {

                    $p = '/\\\\Name: (?P<name>.+)/';
                    preg_match($p, $account, $matches);

                    $accounts[] = [
                        'socsite' => strstr($account, '\\\\', true),
                        'name' => $matches['name'],
                        // 'id' => $matches['id'],
                    ];

                }

                unset($arr);

            }

            foreach ($run_array['target_accaunt'] as $key => $target) {
                
                $arr = [];
                // var_dump( $target );

                if (stristr($target, ' ID')) {

                    $p = '/\\\\Name: (?P<name>.+) ID: (?P<id>.+)/';
                    preg_match($p, $target, $matches);

                    $targets[] = [
                        'socsite' => strstr($target, '\\\\', true),
                        'id' => $matches['id'],
                        'name' => $matches['name'],
                    ];
                    
                } else {

                    $p = '/\\\\Name: (?P<name>.+)/';
                    preg_match($p, $target, $matches);

                    $targets[] = [
                        'socsite' => strstr($target, '\\\\', true),
                        'name' => $matches['name'],
                        // 'id' => $matches['id'],
                    ];

                }

                unset($arr);

            }

            $an_arr = [];
            /**
             * Check all Fb accounts
             */
            foreach ($targets as $checkAcc) {
                if ( stristr($checkAcc['socsite'], 'FaceBook') ) {
                    
                    $an_arr[] = self::checkFbToken($user_id, $checkAcc['name']);
                                                     
                }

            }
            foreach ($accounts as $checkAcc) {
                if ( stristr($checkAcc['socsite'], 'FaceBook') ) {
                    
                    $an_arr[] = self::checkFbToken($user_id, $checkAcc['name']);
                                                     
                }

            }

            $noSynced = [];
            
            try {

                $noSynced[] = self::synchroPost(self::synchroGet($accounts), $targets);
                echo('<h6>Reverse synchronization...</h6>');
                $noSynced[] = self::synchroPost(self::synchroGet($targets), $accounts);

            } catch (\Facebook\Exceptions\FacebookResponseException $e) {
                print_r($e->getMessage());
                throw $e;
            } catch (\Exception $e) {
                throw $e;
            }

            return $noSynced;

            /*
            self::$logger->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INITIATED_LIST_RETWEETER <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
            foreach($twits as $twit) {
                $result = $myTweet->postReTweet($user_keys['user_key'], $user_keys['user_key_secret'], $twit->id, '');
                // dump($result);
            }

            if (!$result) {
                throw new \Exception('Some tweets was not retweeted');
                // print_r('Some problem');
            }

            self::$logger->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_SCRIPT_LIST_RETWEETER <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");*/
            
        } catch (\Exception $e) {

            print 'An error occurred when retweeting from list: ';
            print $e->getMessage() . $e->getLine() . $e->getFile();
            print '<br>';
            throw $e;
            // self::$logger->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_SCRIPT_LIST_RETWEETER [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");          
            // throw $e;
            
        }

    }



    /**
     * [Conf description]
     * @param [type] $token  [description]
     * @param [type] $script [description]
     */
    public static function Conf($token,$script){

        try {
            self::Sync();
            
            $result = "";
            $script_name = $script;
            $i = 0;

            $Script = new User_scripts();
            $Script =  $Script::getParameters($script_name);
            $scriptParameters= json_decode($Script[0]->script_parameters);
            $result .= '<div class="row">';
            $result .= '<div class="col-md-12">';
            $result .= '<div class="panel panel-default">';
            $result .= '<div class="panel-heading">Script parameters</div>';
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
            $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton"  onclick="close_popup()">';
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








 ?>