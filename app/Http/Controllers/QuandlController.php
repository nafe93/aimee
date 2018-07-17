<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\QuandlRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class QuandlController extends Controller
{
    /**
     * Return all the data to the Quandl API dashboard
     * @return array
     */
    public function getPage(Request $request)
    {
        $data = Spark::interact(QuandlRepository::class.'@getData', [$request->user()]);

        return view('api.quandl')->withData($data);
    }
    
}
