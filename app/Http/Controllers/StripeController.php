<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * Return all data to the Stripe API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $this->authenticate($request, 'stripe');

        return view('api.stripe');
    }
    
}
