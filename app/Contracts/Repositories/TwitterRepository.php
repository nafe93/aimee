<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


use Illuminate\Http\Request;

interface TwitterRepository
{
    /**
     * Get the latest tweets on a user timeline
     * @param  string $access_token
     * @param  string $access_token_secret
     * @return Collection
     */
    public function getLatestTweets($access_token, $access_token_secret);

    /**
     * Search for tweets based on a search query
     * @param  string $item
     * @return Collection
     */
    public function searchForTweets($item);

    /**
     * Post a tweet to the timeline
     * @param  string $access_token
     * @param  string $access_token_secret
     * @param  string $tweet
     * @return Response
     */
    public function sendTweet($access_token, $access_token_secret, $tweet);

}