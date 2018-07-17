<?php

namespace App\Repositories;

use App\Contracts\Repositories\LobRepository as LobRepositoryContract;
use Lob\Lob;

class LobRepository implements LobRepositoryContract
{
    const ZIPCODE = '10007';
    /**
     * LOB API KEY
     * @var string
     */
    protected $apikey;

    /**
     * Instance of Lob
     * @var object
     */
    protected $lob;

    /**
     * Initialize Lob
     */
    public function __construct()
    {
        $this->apikey = env('LOB_API_KEY');
        $this->lob = new Lob($this->apikey);
    }

    /**
     * Get all delivery routes for this zip code
     * @param string $zipcode
     * @return array
     */
    public function getRoutes($zipcode)
    {
        $results = $this->lob->routes()->all(['zip_codes' => $zipcode]);

        return $results[0]['routes'];
    }

}
