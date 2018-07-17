<?php

namespace App\Repositories;

use App\Contracts\Repositories\StripeRepository as StripeRepositoryContract;

class StripeRepository implements StripeRepositoryContract
{
    /**
     * @return mixed
     */
    public function getData()
    {
        $data = Stripe::get('/me?fields=id,name,cover,email,gender,first_name,last_name,locale,timezone,link,picture', Auth::user()->getAccessToken());

        return json_decode($data->getGraphUser(),true);
    }

    /**
     * @return mixed
     */
    public function post($message)
    {
        $data = Stripe::post($message, Auth::user()->providers()->where('name', 'facebook')->oauth_token);
    }

}
