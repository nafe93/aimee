<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\TwitterRepository;
use Auth;
use Laravel\Spark\Spark;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    /**
     * Return all tweets to the Twitter API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
         $searchedTweets = json_decode(Spark::interact(TwitterRepository::class.'@searchForTweets', [$request->user(), $this->searchItem]), true);
         return view('api.twitter')->withTweets($searchedTweets['statuses']);
    }
    
}
