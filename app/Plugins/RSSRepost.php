<?php
/**
 * User: Maks Glebov
 * Date: 21.02.17
 *
 * DIR: /var/www/aimee/app/Plugins
 *
 * @todo When posting from RSS, some chars is not encoded, exampl: Разработчики &quot;ВКонтакте&quot; представили
 * @todo Check for count to repost, is it right
 */
namespace App\Plugins;

use App\PluginInterfase;
use App\Console\Commands\Twitter;
use Illuminate\Http\Request;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_scripts;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TwitterRepository;
use App\Repositories\FacebookRepository;
use App\Repositories\LinkedInRepository;
use App\Repositories\AimeeLoggerRepository;
use League\Flysystem\Exception;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Plugins\ChangeAvatar;
use Illuminate\Support\Facades\DB;
use \Facebook\FacebookRedirectLoginHelper;
use \Facebook\FacebookSDKException;
require_once("rss_old/feed.php");


class RSSRepost extends \Feed
{

    protected static $rssTooltipText        = "<strong>RSS-URL field</strong><br>For example: 
        <i>http://www.aweber.com/blog/feed/</i>";
    protected static $typeTooltipText       = "<strong>Type of RSS-script</strong>";
    protected static $countTooltipText      = "<strong>Number of script starts</strong><br>No 
        more than 50 times";
    protected static $keywordTooltipText    = "<strong>Keywords according to which RSS-news will 
        be selected</strong><br>You can use at most 10 keywords written through a comma";

    /**
     * [Run description]
     * @param [type] $run_array [description]
     */
    public static function Run($run_array, $socnet = 'Twitter') {

        $err = false;

        /**
         * RSSRepost initiation
         */
        try {

            $log = new AimeeLoggerRepository();
            $run_array["script_name"] = trim($run_array["script_name"]);
            $run_array['source_social_net1'] =  trim($run_array['source_social_net1']);
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_RSS_REPOST_INIT <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {
            
            print 'Error while primary initiation of RSSRepost script. Error description: <br>';
            print $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_WHEN_START_RSS_REPOST_INIT [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        }
        

        /*$db_rss_parse_id = [];
        $rssRepostParams = DB::table('user_jobs_strategy')->select('script_parameters')->where('script_name', 'RSSRepost')->get();
        foreach ($rssRepostParams as $rss_param) {
            $db_rss_ids[] = json_decode($rss_param->script_parameters)->rss_parse_id;
        }

        $schedulerStarts = [];
        foreach ($db_rss_ids as $rssp_id) {
            $schedulerStarts[] = DB::table('rss_script_timer')->select('id', 'rss_parse_id', 'time')->where('rss_parse_id', $rssp_id)->first();
        }
        dd($schedulerStarts);*/


        /**
         * Checking Sheduler starts time and Script selection
         */
        try {

            $rss_pr_id = json_decode($run_array['params'])->rss_parse_id;

            $schedulerStarts = DB::table('rss_script_timer')->select('id', 'rss_parse_id', 'time')->where('rss_parse_id', $rss_pr_id)->first();
            
            // Проверка на наличие строки со временем (in mysql: aimee->rss_script_timer->time):
            // if ($schedulerStarts->time) {
            //     dump("Time is set. Scrypt was init-ed previously");
            //     dump(date('l jS \of F Y h:i:s A', $schedulerStarts->time));
            // } else {
            //     dump("Time not set. Scrypt wasn't init-ed");
            // }

            if ($schedulerStarts) {
                $run_array['scheduler_starts_time'] = $schedulerStarts->time;
            } else {
                $run_array['scheduler_starts_time'] = false;
            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"RSS_REPOST_SCHEDULER_CHECKED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_RSS_REPOST_SCRIPT_SELECTION <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            switch($run_array['source_social_net1'])
            {
                case "Twitter":
                    self::RSSRePostTwitter($run_array);
                    break;
                case "Facebook":
                    self::RSSRePostFacebook($run_array);
                    break;
                case "LinkedIn":
                    self::RSSRePostLinkedIn($run_array);
                    break;
                default:
                    break;
            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_RSS_REPOST <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");


        } catch (\Exception $e) {
            
            $err = $e->getMessage();
            print 'Error occurred at the finishing RSS Repost script: ' . $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_IN_RSS_REPOST [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
        } finally {

            if (stristr( $err, "Status is a duplicate")) {
                echo "<h5>Only not <span class=\"text-danger\">duplicate tweets</span> were <span class=\"text-success\">published</span></h5>\r\n"; 
            } elseif ($err) {
                print '<h5>RSSRepost finished with errors: '. $err .'</h5>';
            } else {
                print '<h5>RSS-feed messages successfully posted</h5>';
            }

        }
        // self::scriptRetweet($user_id, $source_acc, $param->keywords);
        // $log->WriteLog($user_id,$source_acc,"DONE","4","DONE_RSS_RUNT");
    }


    /**
     * [scriptListRetweet description]
     * @param  [type] $user_id         [description]
     * @param  [type] $twitter_account [description]
     * @param  [type] $keywords        [description]
     * @param  [type] $list            [description]
     * @return [type]                  [description]
     */
    private static function RSSRePostTwitter($run_array)
    {

        try {

            $myTweet = new TwitterRepository();
            $user_keys = $myTweet->GetUserKeys($run_array['user_id'], $run_array['source_account1']);

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $log = new AimeeLoggerRepository();
            // $log->WriteLog("1","2",$run_array['script_name'],$run_array['source_social_net1'],"NAME-SOCNET");
            // unset($log);

            $params = json_decode($run_array['params']);
            // $log = new AimeeLoggerRepository();

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INIT_DONE_IN_RSS_REPOST_TWITTER <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {
            
            print 'Error while initiating RSSRePost Twitter script: ' . $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"INIT_ERROR_IN_RSS_REPOST_TWITTER [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;

        }


        function filter_and_post_rss($run_array, $feeds, $myTweet, $log, $user_keys)
        {
            if ($feeds instanceof \Exception) {
                throw $feeds;
                return false;
            }

            $ex = false;

            try {

                $user_id = trim($run_array['user_id']);
                $source_acc = trim($run_array['source_account1']);

                if ($run_array['scheduler_starts_time']) {
                    foreach ($feeds as $key => $feed) {
                        if (!$feed['feed_pub_date']) {
                            print 'This RSS post don\'t show date';
                            print '<br>';
                        } 
                        /*--> ELSEIF FOR SHEDULER <--*/
                        /*elseif ($run_array['scheduler_starts_time'] > strtotime($feed['feed_pub_date'])) {
                            // If the date the job was last run is more than the published date of the incoming feed, 
                            unset($feeds[$key]);  // then exclude it
                        }*/
                        // maks_2: please rewrite this code to more correct, it shouldn't delete data, 
                        // it should only block sheduler run
                    }
                } else {
                    // print 'This script has not started before';
                    // print '<br>';
                }

                if (empty($feeds)) {
                    throw new \Exception("RSS-feed message(s) with passed parameter(s) not found", 1);   
                }

                foreach ($feeds as $feed)
                {

                    $url_lenght = strlen($feed['feed_url']);
                    $title_length = 140 - 4 - $url_lenght;
                    if (!$title_length) {
                        $title_length = 0;
                    }
                    $title_length = (!$title_length)? 0 : $title_length;
                    $message = substr($feed['feed_title'], 0, 100) . "... " . $feed['feed_url'];
                    $ex = $myTweet->postTweetInCycle($user_keys['user_key'], $user_keys['user_key_secret'], $message);

                    // $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", $feed['feed_title']);
                }

                if ($ex instanceof \Exception) 
                    throw $ex;

                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_FILTER_AND_POST_RSS_TWITTER <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                
            } catch (\Exception $e) {

                print 'An error occurred while filtering and posting to Twitter: ' . $e->getMessage() . '<br>';
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_FILTER_AND_POST_RSS_TWITTER [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                throw $e;

            }

        }


        try {

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"TWITTER_START_SELECT_RSS_SCRIPTS_TYPE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            switch ($params->type) {
                case 'keyword':
                    $feeds = self::getRssDataFromUrlByKeyword(trim($params->url), trim($params->type_data), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $myTweet, $log, $user_keys);
                    break;

                case 'random':
                    $feeds = self::getRssDataFromUrlRandom(trim($params->url), (integer) $params->count, $run_array);
                    // $feeds = self::getTestData(trim($params->url), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $myTweet, $log, $user_keys);
                    break;

                case 'calendar':
                    $feeds = self::getRssDataByDate(trim($params->url), strtotime(trim($params->type_data)), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $myTweet, $log, $user_keys);
                    break;
                // maks_2
                case 'lastTime':
                    $feeds = self::getRssDataByLastDatetime(trim($params->url), strtotime(trim($params->type_data)), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $myTweet, $log, $user_keys);
                    break;
                
                default:
                    $feeds = self::getRssDataFromUrlRandom(trim($params->url), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $myTweet, $log, $user_keys);
                    break;

            } // end SWITCH

        } catch (\Exception $e) {

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_WHEN_SELECTING_RSS_SCRIPTS_TYPE [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            print 'An error occurred while switching between scripts or while script executing: ' . $e->getMessage() . '<br>';
            throw $e;
            
        }


        /**
         * Checking Rss Parse Id:
         */
        try {
            
            $data = json_decode($run_array['params']);
            $result = false;

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            // Check if rss_parse_id returned after this script run
            if (isset($data->rss_parse_id)) {
                $result = DB::table('rss_script_timer')->select()->where('rss_parse_id', $data->rss_parse_id)->first();
                
                // If we have same rss_parse_id in db table rss_script_timer, then we just return the 
                // time of this 
                if ($result) {
                    return $result->time;
                } else {
                // else we insert a new row to rss_script_timer 
                    DB::table('rss_script_timer')->insert(
                        ['rss_parse_id' => $data->rss_parse_id, 'time' => time()]
                    ) or die('Cant add row to table \'rss_script_timer\'');
                }

            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"RSS_PARSE_ID_CHECKED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            
        } catch (\Exception $e) {
            
            print 'An error occurred when checking RSS parse id: ' . $e->getMessage() . '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_WHEN_CHECKING_RSS_PARSE_ID [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;

        }

        
    } // end METHOD


    private static function RSSRePostFacebook($run_array)
    {
        // Попытка получить токен из БД
        try {

            $Fb     = new FacebookRepository();
            $log    = new AimeeLoggerRepository();
            $params = json_decode($run_array['params']);

            $user_id    = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $access_token = '';

            $data = DB::table('user_facebook_accounts')
                                ->select('facebook_access_token')
                                ->where('id_user', $run_array['user_id'])
                                ->where('user_facebook_login', $run_array['source_account1'])
                                ->get();
                                // ->facebook_access_token
            $access_token = $data[0]->facebook_access_token;

            $data = DB::table('user_facebook_accounts')
                                ->select('*')
                                ->where('id_user', $run_array['user_id'])
                                ->where('user_facebook_login', $run_array['source_account1'])
                                ->get();
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"FB_RSS_REPOST_FACEBOOK_TOKEN_WAS_TAKEN <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {

            print 'Error while initiatiating RSSRePost Facebook script: ' . $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_FB_RSS_REPOST_FACEBOOK_WHEN_TAKING_TOKEN [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            //  print_r('<a href="/user_social_accounts?account=facebook">Удалите аккаунт из Aimee и добавьте его снова</a>');
            throw $e;

        }


        function filter_and_post_rss($run_array, $feeds, $Fb, $log, $access_token)
        {
            try {
                $ex = false;
                $user_id = trim($run_array['user_id']);
                $source_acc = trim($run_array['source_account1']);

                if ($feeds instanceof \Exception) {
                    throw $feeds;
                    return false;
                }

                if ($run_array['scheduler_starts_time']) {
                    foreach ($feeds as $key => $feed) {
                        if (!$feed['feed_pub_date']) {
                            print 'RSS post don\'t show date';
                            print '<br>';
                        }
                        /*--> ELSEIF FOR SHEDULER <--*/
                        /*elseif ($run_array['scheduler_starts_time'] > strtotime($feed['feed_pub_date'])) {
                            // If the date the job was last run is more than the published date of the incoming feed, 
                            unset($feeds[$key]);  // then exclude it
                        }*/
                        // maks_2: please rewrite this code to more correct, it shouldn't delete data, 
                        // it should only block sheduler run
                    }
                } else {
                    // print 'This script has not started before';
                    // print '<br>';
                }

                if (empty($feeds)) {
                    throw new \Exception("RSS-feed message(s) with passed parameter(s) not found", 1);   
                }

                foreach ($feeds as $feed)
                {

                    // dump($feed['feed_content']);

                    $data = [
                        'link' => $feed['feed_url'],
                        'title' => $feed['feed_title'],
                        'message' => trim(strip_tags($feed['feed_content'])), // in this text I only saw a link 'Read more' and non-parsed html-tags
                    ];
                    
                    $ex = $Fb->postRss($data, $access_token);
                    // $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", $feed['feed_title']);

                }

                if ($ex instanceof \Exception) 
                    throw $ex;

                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_FILTER_AND_POST_RSS_FB <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

                // $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "DONE_RSS_RUNT_FACEBOOK");
                
            } catch (\Exception $e) {
                
                print 'An error ocurred while filtering and posting to Facebook: ' . $e->getMessage() . '<br>';
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_FILTER_AND_POST_RSS_FB [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                throw $e;

            }
        }


        /**
         * Get RSS-data, then filter it and post to Fb
         */
        try {
            
            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_SELECT_RSS_SCRIPT_TYPE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            switch ($params->type) {
                case 'keyword':
                    $feeds = self::getRssDataFromUrlByKeyword(trim($params->url), trim($params->type_data), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $Fb, $log, $access_token);
                    break;

                case 'random':
                    // $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "RANDOM_RSS_RUNT_FACEBOOK");
                    $feeds = self::getRssDataFromUrlRandom(trim($params->url), (integer) $params->count, $run_array);
                    // $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "RANDOM_RSS_PREPOST");
                    filter_and_post_rss($run_array, $feeds, $Fb, $log, $access_token);
                    break;

                case 'calendar':
                    $feeds = self::getRssDataByDate(trim($params->url), strtotime(trim($params->type_data)), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $Fb, $log, $access_token);
                    // $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "CALENDAR_RSS_PREPOST");
                    break;

                case 'lastTime':
                    $feeds = self::getRssDataByLastDatetime(trim($params->url), strtotime(trim($params->type_data)), (integer) $params->count, $run_array);
                    print_r($feeds);
                    exit;
                    filter_and_post_rss($run_array, $feeds, $Fb, $log, $access_token);
                    // $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "LAST_DATE_RSS_PREPOST");
                    break;
                
                default:
                    $feeds = self::getRssDataFromUrlRandom(trim($params->url), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $Fb, $log, $access_token);
                    break;

            } // end SWITCH
            
        } catch (\Exception $e) {
            
            print 'An error occurred while switching between scripts or while script executing: ' . $e->getMessage() . '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_WHEN_SELECT_RSS_SCRIPT_TYPE [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;
        }
        

        /**
         * Checking Rss Parse Id:
         */
        try {
            
            $data = json_decode($run_array['params']);
            $result = false;

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            // Check if rss_parse_id returned after this script run
            if (isset($data->rss_parse_id)) {
                $result = DB::table('rss_script_timer')->select()->where('rss_parse_id', $data->rss_parse_id)->first();
                
                // If we have same rss_parse_id in db table rss_script_timer, then we just return the 
                // time of this 
                if ($result) {
                    return $result->time;
                } else {
                // else we insert a new row to rss_script_timer 
                    DB::table('rss_script_timer')->insert(
                        ['rss_parse_id' => $data->rss_parse_id, 'time' => time()]
                    ) or die('Cant add row to table \'rss_script_timer\'');
                }

            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"RSS_PARSE_ID_CHECKED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            
        } catch (\Exception $e) {
            
            print 'An error occurred when checking RSS parse id: ' . $e->getMessage() . '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_WHEN_CHECKING_RSS_PARSE_ID [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;

        }



    } // end METHOD





    /**
     * [RSSRePostLinkedIn description]
     * @param [type] $run_array [description]
     */
     private static function RSSRePostLinkedIn($run_array)
    {
        // Get token from DB
        try {

            $linkedIn = new LinkedInRepository();
            $log = new AimeeLoggerRepository();

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            $access_token = '';
            $data = DB::table('user_linkedin_accounts')
                                ->select('linkedin_access_token')
                                ->where('id_user', $run_array['user_id'])
                                ->where('user_linkedin_name', $run_array['source_account1'])
                                ->get();
                                // ->facebook_access_token
            $access_token = $data[0]->linkedin_access_token;

            $data = DB::table('user_linkedin_accounts')
                                ->select('*')
                                ->where('id_user', $run_array['user_id'])
                                ->where('user_linkedin_name', $run_array['source_account1'])
                                ->get();
            
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"LINKEDIN_TOKEN_WAS_TAKEN <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

        } catch (\Exception $e) {
            
            print 'Error while initiatiating RSSRePost LinkedIn script: ' . $e->getMessage();
            print '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_WHEN_TAKING_LINKEDIN_TOKEN [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;
            //  print_r('<a href="/user_social_accounts?account=linkedin">Удалите аккаунт из Aimee и добавьте его снова</a>');
        }


        $params = json_decode($run_array['params']);


        function filter_and_post_rss($run_array, $feeds, $linkedIn, $log, $access_token)
        {

            if ($feeds instanceof \Exception) {
                throw $feeds;
                return false;
            }

            try {
                // $ex = false; // exception already at the end of $linkedIn->postRss() method
                $user_id = trim($run_array['user_id']);
                $source_acc = trim($run_array['source_account1']);

                if ($run_array['scheduler_starts_time']) {
                    foreach ($feeds as $key => $feed) {
                        if (!$feed['feed_pub_date']) {
                            print 'RSS post don\'t show date';
                            print '<br>';
                        } elseif ($run_array['scheduler_starts_time'] > strtotime($feed['feed_pub_date'])) {
                            /*--> ELSEIF FOR SHEDULER <--*/
                            /*elseif ($run_array['scheduler_starts_time'] > strtotime($feed['feed_pub_date'])) {
                                // If the date the job was last run is more than the published date of the incoming feed, 
                                unset($feeds[$key]);  // then exclude it
                            }*/
                            // maks_2: please rewrite this code to more correct, it shouldn't delete data, 
                            // it should only block sheduler run
                        }
                    }
                } else {
                    // Временная поясняющая заглушка:
                    // print 'This script has not started before';
                    // print '<br>';
                }

                if (empty($feeds)) {
                    throw new \Exception("RSS-feed message(s) with passed parameter(s) not found", 1);   
                }

                $linkedIn->postRss($access_token, $feeds);
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"DONE_FILTER_AND_POST_RSS_LINKEDIN <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            } catch (\Exception $e) {

                print 'An error ocurred while filtering and posting to LinkedIn: ' . $e->getMessage() . '<br>';
                $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_FILTER_AND_POST_RSS_LINKEDIN [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
                throw $e;

            }

        }

    
        /**
         * Get RSS and post it by the selected script type
         */
        try {

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"START_SELECT_RSS_SCRIPT_TYPE_LINKEDIN <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
            
            switch ($params->type) {
                case 'keyword':
                    $feeds = self::getRssDataFromUrlByKeyword(trim($params->url), trim($params->type_data), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $linkedIn, $log, $access_token);
                    break;

                case 'random':
                    $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "RANDOM_RSS_RUNT_LINKEDIN");
                    $feeds = self::getRssDataFromUrlRandom(trim($params->url), (integer) $params->count, $run_array);
                    $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "RANDOM_RSS_PREPOST");
                    filter_and_post_rss($run_array, $feeds, $linkedIn, $log, $access_token);
                    break;

                case 'calendar':
                    $feeds = self::getRssDataByDate(trim($params->url), strtotime(trim($params->type_data)), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $linkedIn, $log, $access_token);
                    $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "CALENDAR_RSS_PREPOST");
                    break;

                case 'lastTime':
                    $feeds = self::getRssDataByLastDatetime(trim($params->url), strtotime(trim($params->type_data)), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $linkedIn, $log, $access_token);
                    $log->WriteLog($run_array['user_id'], $run_array['source_account1'], "DONE", "4", "LAST_DATE_RSS_PREPOST");
                    break;
                
                default:
                    $feeds = self::getRssDataFromUrlRandom(trim($params->url), (integer) $params->count, $run_array);
                    filter_and_post_rss($run_array, $feeds, $linkedIn, $log, $access_token);
                    break;

            } // end SWITCH
            
        } catch (\Exception $e) {

            print 'An error occurred while switching between scripts or while script executing: ' . $e->getMessage() . '<br>';
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_WHEN_SELECT_RSS_SCRIPT_TYPE_LINKEDIN [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            throw $e;

        }


        /**
         * Checking Rss Parse Id
         */
        try {
            
            $data = json_decode($run_array['params']);
            $result = false;

            $user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);

            // Check if rss_parse_id returned after this script run
            if (isset($data->rss_parse_id)) {
                $result = DB::table('rss_script_timer')->select()->where('rss_parse_id', $data->rss_parse_id)->first();
                
                // If we have same rss_parse_id in db table rss_script_timer, then we just return the 
                // time of this 
                if ($result) {
                    return $result->time;
                } else {
                // else we insert a new row to rss_script_timer 
                    DB::table('rss_script_timer')->insert(
                        ['rss_parse_id' => $data->rss_parse_id, 'time' => time()]
                    ) or die('Cant add row to table \'rss_script_timer\'');
                }

            }

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"LINKEDIN_RSS_PARSE_ID_CHECKED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");


        } catch (\Exception $e) {

            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"ERROR_LINKEDIN_WHEN_CHECKING_RSS_PARSE_ID [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
            print 'An error occurred while checking rss parse id: ' . $e->getMessage() . '<br>';
            throw $e;
                        
        }





    } // end METHOD







    /**
     * [Conf description]
     * @param [type] $token  [description]
     * @param [type] $script [description]
     */
    public static function Conf ($token, $script) {

        try {
            
            $result = "";
            $script_name = $script;

            // $user_id = trim($run_array['user_id']);
            // $source_acc = trim($run_array['source_account1']);

            $Script = new User_scripts();
            $Script =  $Script::getParameters($script_name);
            $scriptParameters= json_decode($Script[0]->script_parameters);
            $result .= '<div class="row">';
            $result .= '<div class="col-md-12">';
            $result .= '<div class="panel panel-default">';
            	
            /* Close Button */
            $result .= '<div class="panel-heading">Script parameters';
            $result .= '<button type="button" onclick="close_popup()" class="close save_rss" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $result .= '</div>';

            $result .= '<div class="panel-body rss-popup" id="add_script_parameters">';
            	$result .= '<p> Here parameters to your script. Enter please data.</p>';
            


                $result .= '<div class="row bottom10px">';
                    $result .= '<div class="form-group">';
                        $result .= '<div class="col-md-4">';
                            $result .= '<label for="script_param_0" class="col-md-4 actions-control-label text-right">URL</label>';
                            $result .= '<label style="display:none;" for="script_param_0" id="script_label_param_0" class="col-md-4 actions-control-label text-right">url</label>';
                        $result .= '</div>';
                        $result .= '<div class="col-md-6">';
                            // $result .= '<input type="text" id="script_param_0" class="form-control" name="script_param_0" placeholder="RSS link" value="http://jn.nutrition.org/rss/mfr.xml" required>';
                            $result .= '<input type="text" id="script_param_0" class="form-control rss_url" name="script_param_0" placeholder="RSS link" value="http://feeds.feedburner.com/LinuxJournalWebmaster" required>';
                            $result .= '<span class="aimee-tooltip rss-tooltip">'. self::$rssTooltipText .'</span>';
                        $result .= '</div>';
                        $result .= "<div class='col-md-1 form-img hidden'></div>";
                    $result .= '</div>';
                $result .= '</div>';

                $result .= '<div class="row bottom10px">';
                    $result .= '<div class="form-group">';
                        $result .= '<div class="col-md-4">';
                            $result .= '<label for="script_param_1" class="col-md-4 actions-control-label text-right">Type</label>';
                            // $result .= '<label for="script_param_1" class="col-md-4 actions-control-label text-right">By</label>';
                            $result .= '<label style="display:none;" for="script_param_1" id="script_label_param_1" class="col-md-4 actions-control-label text-right">type</label>';
                        $result .= '</div>';
                        $result .= '<div class="col-md-6">';

                            $result .= '<select id="script_param_1" class="form-control rss-type" name="script_param_1">
                                            <option value="keyword">keyword</option>
                                            <option value="random">random</option>
                                            <option value="calendar">calendar</option>
                                            <option value="lastTime">last date</option>
                                        </select>';
                            $result .= '<span class="aimee-tooltip type-tooltip">'. self::$typeTooltipText .'</span>';

                            /*$result .= '<p>
                                            <select id="get_param_1" class="form-control" name="script_param_1">
                                                <option value="keyword">By keyword</option>
                                                <option value="random">By random</option>
                                                <option value="calendar">By Calendar</option>
                                                <option value="lastTime">By last date/time</option>
                                            </select>
                                        </p>';*/
                        $result .= '</div>';
                        // $result .= '<input type="hidden" id="script_param_1" name="script_param_1" value="keyword">';
                    $result .= '</div>';
                $result .= '</div>';

                
                $result .= '<div class="row bottom10px">';
                    $result .= '<div class="form-group">';
                        $result .= '<div class="col-md-4">';
                            $result .= '<label for="script_param_2" class="col-md-4 actions-control-label text-right">Count</label>';
                            $result .= '<label style="display:none;" for="script_param_2" id="script_label_param_2" class="col-md-4 actions-control-label text-right">count</label>';
                        $result .= '</div>';
                        $result .= '<div class="col-md-6">';
                            $result .= '<input type="text" id="script_param_2" class="form-control rss-count" name="script_param_2" placeholder="count" value="5" required>';
                            $result .= '<span class="aimee-tooltip count-tooltip">'. self::$countTooltipText .'</span>';
                        $result .= '</div>';
                    $result .= '</div>';
                $result .= '</div>';


            // $result .= '<!- This area can be reRendered by JS -->';
                $result .= '<div class="row bottom10px">';
                    $result .= '<div id="for-render" class="form-group">';
                        $result .= '<div class="col-md-4">';
                            $result .= '<label for="script_param_3" class="col-md-4 actions-control-label text-right">Keyword</label>';
                            $result .= '<label style="display:none;" for="script_param_3" id="script_label_param_3" class="col-md-4 actions-control-label text-right">type_data</label>';
                        $result .= '</div>';
                        $result .= '<div class="col-md-6">';
                            $result .= '<input type="text" id="script_param_3" class="form-control rss-type-data" name="script_param_3" placeholder="keyword" value="keyword" required>';
                            $result .= '<span class="aimee-tooltip type-data-tooltip">'. self::$keywordTooltipText .'</span>';
                        $result .= '</div>';
                    $result .= '</div>';
                $result .= '</div>';
            // $result .= '<!- This area can be reRendered by JS -->';

                // Debug
                $result .= '<div class="row bottom10px">';
                    $result .= '<div class="form-group">';
                        $result .= '<div class="col-md-4">';
                            $result .= '<label style="display:none;" for="script_param_4" id="script_label_param_4" class="col-md-4 actions-control-label text-right">rss_parse_id</label>';
                        $result .= '</div>';
                        $result .= '<div class="col-md-6">';
                            $result .= '<input type="hidden" id="script_param_4" class="form-control" name="script_param_4" placeholder="count" value="fffffffffff" required>';
                        $result .= '</div>';
                    $result .= '</div>';
                $result .= '</div>';
                // ----------

                /*$result .= '<div class="row">';
                    $result .= '<div class="col-md-offset-4 col-md-6">';
                        $result .= '<input type="checkbox" name="rss-show-tooltips" id="rss-show-tooltips">';
                        $result .= '<label for="rss-show-tooltips"> switch off tooltips for this popup</label>';
                    $result .= '</div>';
                $result .= '</div>';*/

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
            $result .= '<label class="btn btn-primary save_rss check_run_btn active btn-group" id="DiscriptionButton" >';
            // $result .= '<label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton" onclick="check_rss_and_close()">';
            $result .= '<input type="radio" name="options_shedule"> Save And Next';
            $result .= '</label>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</center>';
            $result .= '<br />';

            // Создание хэша для RSS:
            $result .= '<script>';
                $result .= "$('input#script_param_4').val(randomString(200));";
            $result .= '</script>';

            session(['script_target' => $Script[0]->script_target]);
            unset($Script);

            // $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'], "RSS_REPOST_WINDOW_WAS_RENDERED <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

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