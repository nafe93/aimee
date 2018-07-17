<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\FoursquareRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class FoursquareController extends Controller
{
    /**
     * Return all data to the Foursquare API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $venues = Spark::interact(FoursquareRepository::class.'@getVenues', [$request->user()]);

        return view('api.foursquare')->withVenues($venues);
    }
    
}
