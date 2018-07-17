<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface NytRepository
{
    /**
     * Get relative url
     *
     * @return string
     */
    public function getRelativeUrl();

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
     * @return array
     */
    public function getData();

}