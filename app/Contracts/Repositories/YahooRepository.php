<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface YahooRepository
{
    
    /**
     * Get the response from Yahoo API
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
     * @return array
     */
    public function getData();

}