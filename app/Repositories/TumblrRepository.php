<?php

namespace App\Repositories;

use App\Contracts\Repositories\TumblrRepository as TumblrRepositoryContract;
use Tumblr;

class TumblrRepository implements TumblrRepositoryContract
{
    /**
     * Instance of Tumblr API
     * @var object
     */
    protected $tumblr;

    /**
     * Initialize the Controller with necessary arguments
     */
    public function __construct()
    {
        $this->tumblr = new Tumblr();

        // Set API key.
        $this->tumblr->setApiKey(env('TUMBLR_API_KEY'));
    }

    /**
     * Get Basic Information about the blog
     * @return array
     */
    public function getBlogInfo($tumblrBlogUrl)
    {
        $info = $this->tumblr->blogInfo($tumblrBlogUrl);

        return (array)$info;
    }

    /**
     * Get Posts from the Tumblr blog
     * @return array
     */
    public function getPosts($tumblrBlogUrl)
    {
        $info = $this->tumblr->posts($tumblrBlogUrl);

        return (array)$info->response->posts;
    }

    /**
     * Post
     * @param string   $access_token
     * @param string   $messages
     * @return Response
     */
    public function post($access_token, $messages) {

        foreach ($messages as $message) {

        }
    }

}
