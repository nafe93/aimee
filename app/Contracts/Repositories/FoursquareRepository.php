<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface FoursquareRepository
{

    /**
     * Search For Venues
     * @return array
     */
    public function getVenues();

}