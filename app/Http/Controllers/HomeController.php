<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\AgentsRepository;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Artisan;
use Kordy\Ticketit\Controllers\TicketsController;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');
    }
    
    public function home()
    {
//        return redirect()->action(
//            'ManageUserLinkedInAccountsController@loginWithLinkedIn'
//        );
        return view('dashboard/home');
    }

    public function accounts()
    {
        return view('dashboard/accounts');
    }

    public function analytics()
    {
        if(Auth::check() && Auth::user()->AccountType == "3"){
            return view('dashboard/analytics');
        }
    }

    public function icons()
    {
        return view('dashboard/icons');
    }

    public function maps()
    {
        return view('dashboard/maps');
    }

    public function notifications()
    {
        return view('dashboard/notifications');
    }

    public function table()
    {
        return view('dashboard/table');
    }

    public function template()
    {
        return view('dashboard/template');
    }

    public function typography()
    {
        return view('dashboard/typography');
    }

    public function user()
    {
        return view('dashboard/user');
    }

    public function security()
    {
        return view('dashboard/security');
    }

    public function user_social_accounts()
    {
        return view('dashboard/user_social_accounts');
    }

    public function jobs_strategy()
    {
        return view('dashboard/jobs_strategy');
    }

    public function user_tickets()
    {
        return view('dashboard/tickets');
    }

    public function billing()
    {
        return view('dashboard/billing');
    }

}
