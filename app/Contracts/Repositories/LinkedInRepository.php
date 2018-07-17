<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface LinkedInRepository
{
    /**
     * Set options for making the Client request
     * @param string   $access_token
     * @return  void
     */
    public function setRequestOptions($access_token);

    /**
     * Get the response from New York times API
     * @param string $relativeUrl
     */
    public function setGetResponse($relativeUrl);

    /**
     * Get the whole response from a get operation
     * @return array
     */
    public function getResponse();

    /**
     * Get the data response from a get operation
     * @param string   $access_token
     * @return array
     */
    public function getData($access_token);
    
    public function post($access_token, $messages);

}