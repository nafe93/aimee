<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface FacebookRepository
{

    /**
     * Get data
     * @param  string $access_token
     * @return
     */
    public function getUser($access_token);

    /**
     * Get posts
     * @param  string $access_token
     * @return
     */
    public function getFeed($access_token);

    /**
     * Post data
     * @param  string $access_token
     * @param $message
     * @return mixed
     */
    public function post($access_token, $message);

}