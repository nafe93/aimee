<?php

namespace App\Http\Middleware;


namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use phpDocumentor\Reflection\Types\Null_;
use Closure;

class costAjaxPoints
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //User id
        $id = Auth::user()->id;
        $check = Auth::check();

        //cost
//        $cost = 15;
        $cost = env('COST', 15);

        if($check)
        {
            //Points in DB
            $count = DB::table('users')->select('points')->where('id','=',$id)->first();
            $AdditionalCount = DB::table('users')->select('AdditionalPoints')->where('id','=',$id)->first();

            if($count->points <= 0)
            {
                if($AdditionalCount->AdditionalPoints >=$cost)
                {
                    $AdditionalCount->AdditionalPoints = $AdditionalCount->AdditionalPoints - $cost;
                    DB::table('users')->where('id', $id)->update(['AdditionalPoints' => $AdditionalCount->AdditionalPoints]);
                    return $next($request);
                }
                else if($AdditionalCount->AdditionalPoints < $cost)
                {
                    if($request->ajax())
                    {
                        $AdditionalCount->AdditionalPoints = $AdditionalCount->AdditionalPoints - $cost;
                        return response("You do not have enough points $AdditionalCount->AdditionalPoints");
                    }
                    else{
                        return $next($request);
                    }
                }
                else
                {
                    if($request->ajax())
                    {
                        return response("Something went wrong");
                    }
                }
            }
            else if($count->points >= $cost)
            {
                $count->points = $count->points - $cost;
                DB::table('users')->where('id', $id)->update(['points' => $count->points]);
                return $next($request);
            }
            else if($count->points < $cost && $count->points > 0)
            {
                $counts = $count->points - $cost;
                DB::table('users')->where('id', $id)->update(['points' => 0]);
                if($AdditionalCount->AdditionalPoints >= $counts)
                {
                    $AdditionalCount->AdditionalPoints = $AdditionalCount->AdditionalPoints + $counts;
                    DB::table('users')->where('id', $id)->update(['AdditionalPoints' =>  $AdditionalCount->AdditionalPoints]);
                    return $next($request);
                }
                else if($AdditionalCount->AdditionalPoints < $counts)
                {
                    if($request->ajax())
                    {
                        return response("You do not have enough points");
                    }
                }
                else
                {
                    if($request->ajax())
                    {
                        return response("Something went wrong");
                    }
                }
            }

        }
        return $next($request);
    }
}