<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\LastFmRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class LastFmController extends Controller
{

    /**
     * Return all tweets to the LastFM API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $details = Spark::interact(LastFmRepository::class.'@getArtistInfo', [$request->user()]);

        $albums = array_slice($this->getTopAlbums(), 0, 4);

        $tracks = array_slice($this->getTopTracks(), 0, 10);

        return view('api.lastfm')->withDetails($details)->withAlbums($albums)->withTracks($tracks);

    }
    
}
