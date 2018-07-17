<?php

namespace App\Repositories;

use App\Contracts\Repositories\FoursquareRepository as FoursquareRepositoryContract;
use FoursquareApi;

class FoursquareRepository implements FoursquareRepositoryContract
{
    /**
     * Instance of Foursquare API
     * @var object
     */
    protected $foursquare;

    /**
     * Initialize the Controller with necessary arguments
     */
    public function __construct()
    {
        $this->foursquare = new FoursquareApi(env('FOURSQUARE_KEY'), env('FOURSQUARE_SECRET'));
    }

    /**
     * Search For Venues
     * @return array
     */
    public function getVenues()
    {
        // Searching for venues nearby e.g Lagos, Nigeria
        $endpoint = 'venues/search';

        // Prepare parameters
        $params = ['near' => 'Los Angeles, California'];

        // Perform a request to a public resource
        $response = json_decode($this->foursquare->GetPublic($endpoint,$params),true);

        return $response['response']['venues'];
    }

    /**
     * Search For Venues
     * @return array
     */
    public function getCheckins()
    {
        // Searching for venues nearby e.g Lagos, Nigeria
        $endpoint = 'checkins';

        // Prepare parameters
        $params = ['oauth_token' => Auth::user()->providers()->where('name', 'foursquare')->first()->getAccessToken];

        // Perform a request to a public resource
        $response = json_decode($this->foursquare->GetPrivate($endpoint,$params),true);

        return $response['response']['checkins'];
    }

}
