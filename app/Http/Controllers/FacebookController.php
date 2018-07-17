<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\FacebookRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Laravel\Spark\Spark;

class FacebookController extends Controller
{
    protected $user;

    /**
     * Return all data to the Facebook API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $userDetails = Spark::interact(FacebookRepository::class.'@getData', [$request->user()->providers()->where('provider', 'facebook')->first()->getAccessToken]);

        return view('api.facebook')->withDetails($userDetails);
    }
    
}
