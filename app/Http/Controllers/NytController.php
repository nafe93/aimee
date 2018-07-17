<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\NytRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class NytController extends Controller
{
    /**
     * Return all the data to the New York times API dashboard
     * @return array
     */
    public function getPage(Request $request)
    {
         $data = Spark::interact(NytRepository::class.'@getData', [$request->user()]);

        return view('api.nyt')->withData($data);
    }
    
}
