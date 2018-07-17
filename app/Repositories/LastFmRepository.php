<?php

namespace App\Repositories;

use App\Contracts\Repositories\LastFmRepository as LastFmRepositoryContract;
use Dandelionmood\LastFm\LastFm;

class LastFmRepository implements LastFmRepositoryContract
{
    /**
     * @var array
     */
    protected $sampleArtist = ['artist' => 'Incubus'];

    /**
     * LastFm Object
     * @var object;
     */
    protected $lastfm;

    /**
     * Initialize the Controller with necessary arguments
     */
    public function __construct()
    {
        $this->lastfm = new LastFm(env('LASTFM_API_KEY'), env('LASTFM_API_SECRET'), Auth::user()->providers()->where('name', 'lastfm')->first()->getAccessToken);
    }

    /**
     * Get Artist Info
     * @return array
     */
    public function getArtistInfo()
    {
        $result = (array)$this->lastfm->artist_getInfo($this->sampleArtist);

        return $result['artist'];
    }

    /**
     * Get Top Albums
     * @return array
     */
    public function getTopAlbums()
    {
        $result = (array)$this->lastfm->artist_getTopAlbums($this->sampleArtist);

        return $result['topalbums']->album;
    }

    /**
     * Get Top Tracks
     * @return array
     */
    public function getTopTracks()
    {
        $result = (array)$this->lastfm->artist_getTopTracks($this->sampleArtist);

        return $result['toptracks']->track;
    }

    /**
     * Post a message on user wall
     */
    public function shout() {
        
        // We try to publish something on my wall.
        // Note the «true» in the last parameter, this tells the class that it's
        // a call that need authentication (session_key + signature are added).
        $result = $this->lastfm->user_shout(array(
            'user' => 'dandelionmood',
            'message' => "I just installed your Last.fm API wrapper :) !"
        ), true);

    }

}
