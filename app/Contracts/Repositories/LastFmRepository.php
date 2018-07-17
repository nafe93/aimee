<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface LastFmRepository
{

    /**
     * Get Artist Info
     * @return array
     */
    public function getArtistInfo();

    /**
     * Get Top Albums
     * @return array
     */
    public function getTopAlbums();
        
    /**
     * Get Top Tracks
     * @return array
     */
    public function getTopTracks();

    /**
     * Post a message on user wall
     */
    public function shout();

}