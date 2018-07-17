<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{
    /**
     * Return all data to the Paypal API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        return view('api.paypal');
    }
    
}
