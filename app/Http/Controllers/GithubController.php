<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\GithubRepository;
use App\Http\Requests;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class GithubController extends Controller
{
    /**
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $details = Spark::interact(GithubRepository::class.'@getRepoDetails', [$request->user()]);

        return view('api.github')->withDetails($details);
    }
    
}
