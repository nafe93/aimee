<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class SteamController extends Controller
{
     /**
     * Return all data to the Steam API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        return view('api.steam');
    }


}
