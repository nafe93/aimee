<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\LobRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class LobController extends Controller
{

    /**
     * Return all data to the Lob API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $routes = Spark::interact(LobRepository::class.'@getRoutes', [$request->user()]);

        return view('api.lob')->withRoutes($routes);
    }
    
}
