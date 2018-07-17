<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\YahooRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class YahooController extends Controller
{
     /**
     * Return all data to the Yahoo API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $data = Spark::interact(YahooRepository::class.'@getData', [$request->user()]);

        return view('api.yahoo')->withData($data);
    }

}
