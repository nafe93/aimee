<?php

namespace App\Repositories;

use App\Contracts\Repositories\NytRepository as NytRepositoryContract;
use GuzzleHttp\Client;

class NytRepository implements NytRepositoryContract
{
    const API_URL = 'http://api.nytimes.com/svc';
    const RELATIVE_URL = '/topstories/v2/home.json?api-key={apiKey}';

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
        $this->baseUrl = self::API_URL;
        $this->client = new Client(['base_uri' => $this->baseUrl]);
        $this->setGetResponse($this->getRelativeUrl());
    }

    /**
     * Get relative url
     *
     * @return string
     */
    public function getRelativeUrl()
    {
        return str_replace('{apiKey}', env('NYT_TOPSTORIES_APIS_KEY'), self::RELATIVE_URL);
    }

    /**
     * Get the response from New York times API
     * @param string $relativeUrl
     */
    public function setGetResponse($relativeUrl)
    {
        $this->response = $this->client->get($this->baseUrl . $relativeUrl, []);
    }

    /**
     * Get the whole response from a get operation
     * @return array
     */
    public function getResponse()
    {
        return json_decode($this->response->getBody(), true);
    }

    /**
     * Get the data response from a get operation
     * @return array
     */
    public function getData()
    {
        return $this->getResponse()['results'];
    }

}
