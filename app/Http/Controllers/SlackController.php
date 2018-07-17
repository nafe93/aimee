<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\SlackRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use Laravel\Spark\Spark;

class SlackController extends Controller
{
    /**
     * Return all data to the Slack API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $members = Spark::interact(SlackRepository::class.'@getAllUsersOnYourTeam', [$request->user(), 4]);

        return view('api.slack')->withMembers($members);
    }
    
}
