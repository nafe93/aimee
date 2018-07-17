<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface TumblrRepository
{
    /**
     * Get Basic Information about the blog
     * @return array
     */
    public function getBlogInfo($tumblrBlogUrl);

    /**
     * Get Posts from the Tumblr blog
     * @return array
     */
    public function getPosts($tumblrBlogUrl);

    /**
     * Post
     * @param string   $access_token
     * @param string   $messages
     * @return Response
     */
    public function post($access_token, $messages);

    }