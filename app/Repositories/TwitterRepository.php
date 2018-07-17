<?php
namespace App\Repositories;
/**
 * DIR: /var/www/aimee/app/Repositories
 */

use App\Contracts\Repositories\TwitterRepository as TwitterRepositoryContract;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Twitter;
use Abraham\TwitterOAuth\TwitterOAuth;


class TwitterRepository implements TwitterRepositoryContract
{
    // use \Thujohn\Twitter\Traits\ListTrait;
    /**
     * Item to be searched for, combing through twitter's massive data
     * @var string
     */
    protected $searchItem;

    /**
     * Initialize the Controller with necessary arguments
     */
    public function __construct()
    {
        try {
            $this->searchItem = 'aimee';
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }

    public function GetMyTwit($access_token, $access_token_secret, $user, $count = 200) {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);

            return Twitter::getUserTimeline(['screen_name' => $user, 'format' => 'json', 'count' => $count]);

        } catch (\Exception $e) {
            print 'An error occurred when getting tweet: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }

    public function GetMyTwitById($access_token, $access_token_secret, $id) {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);

//            return Twitter::getUserTimeline(['place_id' => $user, 'format' => 'json', 'count' => $count]);
            return Twitter::getTweet($id);

        } catch (\Exception $e) {
            print 'An error occurred when getting tweet: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }

    public function GetFavorites($access_token, $access_token_secret, $user, $count = 200) {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);

            return Twitter::GetFavorites(['screen_name' => $user, 'format' => 'json', 'count' => $count]);

        } catch (\Exception $e) {
            print 'An error occurred when getting tweet: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }

    /**
     * Get the latest tweets on a user timeline
     * @return Collection
     */
    public function getLatestTweets($access_token, $access_token_secret, $count = 5)
    {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);
            return Twitter::getHomeTimeline(['count' => $count, 'format' => 'json']);
        } catch (\Exception $e) {
            print 'An error occurred when getting latest tweets: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }

    /**
     * Search for tweets based on a search query
     * @param  string $item
     * @return Collection
     */
    public function searchForTweets($item)
    {
        try {
            // return Twitter::getSearch(['q' => $item, 'count' => 4, 'format' => 'json']);
            return Twitter::getSearch(['q' => $item, 'count' => 10, 'format' => 'json']);
        } catch (\Exception $e) {
            print 'An error occurred when searching for tweets: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }


    /**
     * Post a tweet to the timeline
     * @param  string $access_token
     * @param  string $access_token_secret
     * @param  string $tweet
     * @return Response
     */
    public function sendTweet($access_token, $access_token_secret, $tweet)
    {
        try {
            Twitter::reconfig(['token' => $access_token,
                        'secret' => $access_token_secret]);

            Twitter::postTweet(['status' => $tweet, 'format' => 'json']);

            // return redirect()->back()->with('info', trans('texts.twitter.success'));
        } catch (\Exception $e) {
            print 'An error occurred when sending tweet: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }

    /**
     * Removing tweet by this id
     * @param [type] $access_token        [description]
     * @param [type] $access_token_secret [description]
     * @param [type] $id                  [description]
     */
    public function Destroy($access_token, $access_token_secret, $id) {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);
            Twitter::destroyTweet($id, ['trim_user' => false]);
            
        } catch (\Exception $e) {
            print 'An error occurred when destroying tweet with id = ' . $id . ' : ' . $e->getMessage();
            print '<br>';
            // Expecting, that this script will using in loop. Bacuse that I stwitch off 
            // the throwing Exception and return false:
            // throw $e; 
            return false;
        }
    }

    /**
     * [sendMediaTweet description]
     * @param  [type] $access_token        [description]
     * @param  [type] $access_token_secret [description]
     * @param  [type] $media               [description]
     * @param  [type] $status              [description]
     * @return [type]                      [description]
     */
    public function sendMediaTweet($access_token, $access_token_secret, $media, $status)
    {
        try {

            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);

            $media1 = Twitter::uploadMedia(['media_data' => $media]);
            $parameters = ['status' => $status,'media_ids' => $media1->media_id_string];
            Twitter::postTweet($parameters);
            
        } catch (\Exception $e) {
            print 'An error occurred when sending media tweet: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }

    /**
     * [postReTweet description]
     * @param  [type] $access_token        [description]
     * @param  [type] $access_token_secret [description]
     * @param  [type] $tweet_id            [description]
     * @param  [type] $status              [description]
     * @return [type]                      [description]
     */
    public function postReTweet($access_token, $access_token_secret, $tweet_id, $status)
    {

        try {

            $var = Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);
            $var = Twitter::postRt($tweet_id, ['format' => 'json']);

            return true;
        
        } catch (\Exception $e) {
            print 'An error occurred when retweeting tweet with id = ' . $tweet_id . '. Error description: ' . $e->getMessage();
            print '<br>';
        
            return $e;
            // throw $e; // uncommenting this will cause that any error will break any loop outside 
        }

    }

    public function postTweet($access_token, $access_token_secret, $status)
    {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);
            Twitter::postTweet(['status' => $status]);
        } catch (\Exception $e) {
            print 'An error occurred when posting tweet: ' . $e->getMessage();
            print '<br>';
            throw $e;
            // return $e;
        }
    }


    /*------------- START [ADDED BY Nafe Alkzir 21.02.2017] ------------------*/

    public function postTweetInCycle($access_token, $access_token_secret, $status)
    {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);
            if (Twitter::postTweet(['status' => $status])) 
                echo "One tweet <span class=\"text-success\">successfully posted</span>\r\n";   
            
        } catch (\Exception $e) {
            if (stristr( $e->getMessage(), "Status is a duplicate")) {
                echo "One tweet <span class=\"text-danger\">wasn't posted</span>, because it is duplicate of already posted tweet\r\n"; 
            } else {
                print 'An error occurred when posting tweet: ' . $e->getMessage();
                print '<br>';
                // throw $e;
            }
            return $e;
        }
    }



    public function syncPostTweet($access_token, $access_token_secret, $status)
    {
        try {
            Twitter::reconfig(['token' => $access_token,
                'secret' => $access_token_secret]);
            return Twitter::postTweet(['status' => $status]);
        } catch (\Exception $e) {
            print 'An error occurred when posting tweet: ' . $e->getMessage();
            print '<br>';
            return $e;
            // throw $e;
        }
    }

    /**
     * Собирает информацию по аккаунтам в указанном листе, затем проходится по твитам этих аккаунтов,
     * выбирает только твиты с заданным хэштегом, сортирует по поулярности и возвращает
     * 
     * @param  array  $settings [description]
     * @return [type]           [description]
     * @todo   Добавить возможность делать выборку по нескольким хэштегам; Обрезать итоговый массив до 10 эл.
     */
    public function listMembersTwitsByHashtags($hashtags, $twitter_account, $list)
    {

        try {

            $list_members = Twitter::query('lists/members.json?', 'GET', ['owner_screen_name' => $twitter_account, 'slug' => $list]);
            
            $data = [];
            foreach ($list_members->users as $user) {
                try {
                    $result = Twitter::getUserTimeline(['user_id' => $user->id, 'count' => '30']);
                    $data[] = $result;
                } catch (\Exception $e)
                {
                    print 'An error occurred when getting user tweets: ' . $e->getMessage();
                    print '<br>';
                    throw $e;
                }
            }

            $new_data = array_reduce($data, 'array_merge', array());

            $key_data = [];
            $is_found = [];

            foreach ($new_data as $key => $item) {

                foreach ($item->entities->hashtags as $tag) {
                    
                    foreach ($hashtags as $keyword) {
                        
                        if (!isset($is_found[$keyword])) {
                            $is_found[$keyword] = false;
                        }
                        if (strtolower($tag->text) == strtolower($keyword)) {
                            // $key_data[$key . "_" . $tag->text] = $data[$key];
                            $key_data[] = $new_data[$key];
                            $is_found[$keyword] = true;
                        }

                    }

                }

            }

            /*if (empty($key_data)) {
                throw new \Exception("\n <span class=\"text-danger\">No tweets with passed hashtag(s) were found</span>\n", 1);
                exit;
            }
            */

            $is_found;
            $key_data;

            $sort = [];
            foreach($key_data as $k=>$v) {
                $sort['retweet_count'][$k] = $v->retweet_count;
                $sort['favorite_count'][$k] = $v->favorite_count;
            }

            if (isset($sort['retweet_count']) && $sort['favorite_count']) {
                array_multisort($sort['retweet_count'], SORT_DESC, $sort['favorite_count'], SORT_DESC, $key_data);
            } else {
                $key_data = [];
            }

            return ['tweets' => $key_data, 'is_found' => $is_found];

        } catch (\Exception $e) {
            print 'An error occurred when sorting user tweets: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
        // $list_members = Twitter::getListsMembers(['owner_screen_name' => $twitter_account, 'slug' => $list]);
        
        // This for sort list members by followers_count and friends_count:
        /*  
            $sort = [];
            foreach($list_members->users as $k=>$v) {
                // dump($v);
                $sort['followers_count'][$k] = $v->followers_count;
                $sort['friends_count'][$k] = $v->friends_count;
            }
            array_multisort($sort['followers_count'], SORT_DESC, $sort['friends_count'], SORT_DESC, $list_members->users);
        */

        

    }


    /**
     * [listMembersTwitsByKeywords description]
     * @param  [type] $keywords        [description]
     * @param  [type] $twitter_account [description]
     * @param  [type] $list            [description]
     * @return [type]                  [description]
     */
    public function listMembersTweetsByKeywords($keywords, $twitter_account, $list)
    {

        try {
            
            $list_members = Twitter::query('lists/members.json?', 'GET', ['owner_screen_name' => $twitter_account, 'slug' => $list]);

        } catch (\Exception $e) {
            if (stristr($e->getMessage(), 'that page does not exist')) {
                print 'Error when getting members by list: This list was not found';
                print '<br>';
                // throw $e;
                throw new \Exception("This list was not found", 1);
                
            } else {
                print 'Error when getting members by list: ' . $e->getMessage();
                print '<br>';
                throw $e;
            }
        }

        $is_found = [];

        try {
        
            $data = [];
            foreach ($list_members->users as $user) {
                foreach ($keywords as $key => $keyword) {
                    
                    if (!isset($is_found[$keyword])) {
                        $is_found[$keyword] = false;
                    }

                    $result = Twitter::getSearch(['q' => $keyword . " from:" . $user->screen_name, ' result_type' => 'popular']);
                    if (!empty($result->statuses)) {
                        $is_found[$keyword] = true;
                    } 

                    $data[] = $result;
                    // $data[] = Twitter::getSearch(['q' => $keyword . " from:" . $user->screen_name, ' result_type' => 'popular', 'count' => '5']);
                    // $data[] = Twitter::getSearch(['q' => $keyword . " from:" . $user->screen_name . '&result_type=popular']);
                }
            }

        } catch (\Exception $e) {
            print 'Error when getting members tweets by keywords: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }

        try {

            $new_data = [];
            foreach ($data as $key => $item) {
                if (!empty($item->statuses)) {
                    $new_data[] = $item->statuses;
                }
            }

            $data = array_reduce($new_data, 'array_merge', array());

            /*if (empty($data)) {
                throw new \Exception('No tweets by passed keywords were found');
            }*/

            /*
             * Сортировка по количеству ретвитов и лайков. Если понадобится, то можно раскомментировать
             * */
            /*$sort = [];
            foreach($data as $k=>$v) {
                $sort['retweet_count'][$k] = $v->retweet_count;
                $sort['favorite_count'][$k] = $v->favorite_count;
            }

            array_multisort($sort['retweet_count'], SORT_DESC, $sort['favorite_count'], SORT_DESC, $data);*/

            return ['tweets' => $data, 'is_found' => $is_found];
            
        } catch (\Exception $e) {
            print 'Error when sorting members tweets: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }

    }


    /**
     * [listMembersPopularTwits description]
     * @param  [type] $twitter_account [description]
     * @param  [type] $list            [description]
     * @param  [type] $keywords        [description]
     * @return [type]                  [description]
     */
    public function listMembersPopularTwits($twitter_account, $list)
    {
        try {
            $list_members = Twitter::query('lists/members.json?', 'GET', ['owner_screen_name' => $twitter_account, 'slug' => $list]);
            if ( empty($list_members->users) ) {
                throw new \Exception("This list have not any users", 1);
            }
        } catch (\Exception $e) {

            if (stristr($e->getMessage(), 'that page does not exist')) {
                print 'Error when getting members by list: This list was not found';
                print '<br>';
                throw $e;
            } else {
                print 'Error when getting members by list: ' . $e->getMessage();
                print '<br>';
                throw $e;
            }
        }

        try {

            $data = [];
            foreach ($list_members->users as $user) {
                $user->id;
                try {
                    // $data[] = Twitter::getSearch(['q' => "from:" . $user->screen_name, 'result_type' => 'popular']);
                    $data[] = Twitter::getSearch(['q' => "from:" . $user->screen_name, 'count' => '30']);
                } catch (\Exception $e)
                {
                    print 'Error: ' . $e->getMessage();
                    print '<br>';
                }
            }

            $new_data = [];
            foreach ($data as $item) {
                if (!empty($item->statuses)) {
                    $new_data[] = $item->statuses;
                }
            }

            $data = null;
            $data = array_reduce($new_data, 'array_merge', array());

            $to_sort = [];
            foreach($data as $k => $status) {
                $to_sort['retweet_count'][$k] = $status->retweet_count;
                $to_sort['favorite_count'][$k] = $status->favorite_count;
            }

            array_multisort($to_sort['retweet_count'], SORT_DESC, $to_sort['favorite_count'], SORT_DESC, $data);

            if (empty($data)) {
                throw new \Exception("No popular tweets with passed keyword(s) was(were) found", 1);
                print '<br>';
            }

            // return only 20 most popular tweets:
            return array_slice($data, 0, 20);
            
        } catch (\Exception $e) {
            print 'Error when getting members twits by list: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }

    }


    /**
     * [getAllTweetsByKeyword description]
     * @param  [type] $keywords        [description]
     * @param  [type] $twitter_account [description]
     * @return [type]                  [description]
     */
    public function getAllTweetsByKeyword($keyword, $twitter_account)
    {
        try {
            
            $data = [];
            $data[] = Twitter::getSearch(['q' => $keyword, 'result_type' => 'popular', 'count' => '15']);
            $new_data = [];
            foreach ($data as $key => $item) {
                if (!empty($item->statuses)) {
                    $new_data[] = $item->statuses;
                }
            }

            $result = [];
            if (empty($new_data)) {
                $result = new \Exception("No popular tweets with keyword <span class=\"text-danger\">$keyword</span> were found", 1);
            }

            $data = array_reduce($new_data, 'array_merge', array());
            return ['data' => $data, 'result' => $result];
            
        } catch (\Exception $e) {
            print "Error when getting all tweets by keyword: " . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }


    /**
     * [getUserFavs description]
     * @param  string $user_id [description]
     * @return [type]          [description]
     */
    public function getUserFavs($user_id = '')
    {
        try {
            $result = Twitter::query('favorites/list', 'GET', ['screen_name' => 'Red_Rain91', 'count' => '100']);
            return $result;
        } catch (\Exception $e) {
            print "Error when getting user favorites: " . $e->getMessage();
            print '<br>';
            throw $e;
        }
    }


    /**
     * [favoriteTweetByKey description]
     * @param  [type] $user_keys [description]
     * @param  [type] $tweet_id  [description]
     * @param  [type] $keywords  [description]
     * @return [type]            [description]
     */
    public function favoriteTweetByKey($user_keys, $tweet_id)
    {

        try {
            Twitter::reconfig(['token' => $user_keys['user_key'],
                'secret' => $user_keys['user_key_secret']]);

            Twitter::postFavorite(['id' => $tweet_id, 'include_entities' => 'false']);
            // Twitter::destroyFavorite(['id' => $tweet_id]);

            echo "One tweet with tweet-id:$tweet_id was <span class=\"text-success\">favorited</span>\r\n";
            return true;

        } catch (\Exception $e) {

            print "Error while favoriting one tweet by key: " . $e->getMessage() . " ";
            print '<br>';
            // throw $e;
            return $e;

        }

    }

    /**
     * [changeAvatar description]
     * @param  [type] $user_keys [description]
     * @return [type]            [description]
     * @todo: upload images from dir -> '/opt/aimee/USERNAME/SOCNET/ACC/imgN.jpg/png/bmp' -> to $image var.  example: file_get_contents(base64_encode('image/dir/file.png')) 
     */
    public function changeAvatar($user_keys)
    {

        try {
            
            $connection = new TwitterOAuth(env('TWITTER_API_KEY'), env('TWITTER_APP_SECRET'), env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
            // $connection = new TwitterOAuth('vWSZuGJDWe9Rs37SYXAvm0nV3', 'w7GfqZg5OESEpNr6bH2qmPSbCigRU1vYSzBr02kw7pPKoAeTrP', '624333180-ed4mS0R3ijLIprFqJHbpFketpDy7enUkhwfTGrFx', '7xoiXeDoAPI2jr60Bx6vhHHfScBP1YCfTXMCWv2JDBem2');
            $image = "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";
            $parameters = ['image' => $image];
            $connection->post('account/update_profile_image', $parameters, true);
            
        } catch (\Exception $e) {
            
            print "Error when changing avatar: " . $e->getMessage();
            print '<br>';
            throw $e;

        }

    }


    /*------------- END ------------------*/



    /**
     * [GetUserKeys description]
     * @param [type] $user_id      [description]
     * @param [type] $user_account [description]
     */
    public function GetUserKeys($user_id,$user_account)
    {
        try {
 
            $user_request = \DB::table('user_twitter_accounts')->where('id_user',$user_id)->where('user_twitter_login',$user_account)->get();
            //echo var_dump($user_request);
            //echo $user_request[0]->twitter_access_token_secret;
            $result = ['user_key' => $user_request[0]->twitter_access_token, 'user_key_secret' => $user_request[0]->twitter_access_token_secret];
            return $result;
            
        } catch (\Exception $e) {
            // $err .= ' ' . $e->getMessage();
            print "Error when getting user keys: " . $e->getMessage();
            print '<br>';
            throw $e;

        }
    }

}

/**
 * @param $errno
 * @param $errstr
 * @param $errfile
 * @param $errline
 * @return bool
 */
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    return true;
}

