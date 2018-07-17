<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface LobRepository
{

    /**
     * Get all delivery routes for this zip code
     * @param string $zipcode
     * @return array
     */
    public function getRoutes($zipcode);

}