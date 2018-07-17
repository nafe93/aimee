<?php

namespace App\Repositories;

use App\Contracts\Repositories\YahooRepository as YahooRepositoryContract;
use GuzzleHttp\Client;
use Auth;
use Session;

class YahooRepository implements YahooRepositoryContract
{
    const YAHOO_API = 'https://query.yahooapis.com/v1/public/yql';
    /**
     * Instance of Guzzle Client
     * @var object
     */
    protected $client;

    /**
     * BaseUrl
     * @var string
     */
    protected $baseUrl;

    /**
     * Initialize the Controller with necessary arguments
     */
    public function __construct()
    {
        $this->baseUrl = self::YAHOO_API;
        $this->client = new Client(['base_uri' => $this->baseUrl]);

        $query = "SELECT * FROM weather.forecast WHERE (location = 10007)";

        $relativeUrl = '?q=' . $query . '&format=json';
        $this->setGetResponse($relativeUrl);
    }

    /**
     * Get the response from Yahoo API
     * @param string $relativeUrl
     */
    private function setGetResponse($relativeUrl)
    {
        $this->response = $this->client->get($this->baseUrl . $relativeUrl, []);
    }

    /**
     * Get the whole response from a get operation
     * @return array
     */
    private function getResponse()
    {
        return json_decode($this->response->getBody(), true);
    }

    /**
     * Get the data response from a get operation
     * @return array
     */
    private function getData()
    {
        return $this->getResponse()['query']['results']['channel'];
    }

}