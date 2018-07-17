<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
use DB;
use phpDocumentor\Reflection\Types\Null_;

/**
* This middleware will be using for HTTP qq
*
*/

class CostPoints
{
	public $content = [];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    	$_count  = 0;
        $_count2 = 0;
        $id = Auth::id();
        $content2 = [];
        $group_names = [];
        $check = Auth::check();
        /*
         * Twitter
         */
        if($check){
            $data_T = DB::table('user_twitter_accounts')->select('*')->where('id_user','=',$id)->get();
            foreach ($data_T as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "Twitter\\\\"."Name: ".$dat->user_twitter_login;
                }
            }
        }
        /*
         * FaceBook
         */
        if($check){
            $data_F = DB::table('user_facebook_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_F as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "FaceBook\\\\"."Name: ".$dat->user_facebook_login . " ID: " .  $dat->id_user_facebook;
                }
            }
        }
        /*
         * LinkedIn
         */
        if($check){
            $data_L = DB::table('user_linkedin_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_L as $dat){
                if($id == $dat->id_user){
                    $this->content[] =  "LinkedIn\\\\"."Name: ".$dat->user_linkedin_name . " ID: " . $dat->id_user_linkedin;
                }
            }
        }
        /*
         * Google
         */
        if($check){
            $data_G = DB::table('user_google_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_G as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "Google\\\\"."Name: ".$dat->user_google_name . " ID: " . $dat->id_user_google;
                }
            }
        }
        /*
         * Instagram
         */
        if($check){
            $data_I = DB::table('user_instagram_accounts')->where('id_user','=',$id)->select('*')->get();
            foreach ($data_I as $dat){
                if($id == $dat->id_user){
                    $this->content[] = "Instagram\\\\"."Name: ".$dat->user_instagram_name . " ID: " . $dat->id_user_instagram;
                }
            }
        }
        /*
         * Group
         */
        if($check){
            $data_G = DB::table('cs_user_group_table')->select('*')->where('user_id','=',$id)->get();
            foreach ($data_G as $dat){
                if($id == $dat->user_id){
                    //$content[] = "Group\\\\"."Name: ".$dat->user_instagram_name . " ID: " . $dat->id_user_instagram;
                    $group_names[] = $dat->group_name;
                    $content2[] = $dat->target;
                }
            }
        }

        asort($this->content);
        asort($content2);
        asort($group_names);

        /*// Это он должен возвращать при том условии, что деньги закончились
        return response()->view('dashboard.cross-sharing', array(
        	'data'=>$this->content, 
        	'data2'=>$content2, 
        	'group_names'=>$group_names, 
        	'moneyEnd' => true)
        );
*/
        //Check before execution
        $response = $next($request);

        // Это было просто для теста
        // return response()->view('dashboard.test', ['test' => $request]);
        // return $next($request);

        //User id
        $id = Auth::id();
        $check = Auth::check();

        //cost
//        $cost = 15;
        $cost = env('COST', 15);
        if($check)
        {
            $count = DB::table('users')->select('points')->where('id','=',$id)->first();
            $AdditionalCount = DB::table('users')->select('AdditionalPoints')->where('id','=',$id)->first();

            /*-----------------------------------*/
            if($count->points > 0) {
            	DB::table('users')->where('id', $id)->update(['points' => $AdditionalCount->AdditionalPoints - $cost]);
            	return $response;
            } else {
            	return response()->view('dashboard.cross-sharing', array(
		        	'data'=>$this->content, 
		        	'data2'=>$content2, 
		        	'group_names'=>$group_names, 
		        	'moneyEnd' => true)
		        );
            }
            /*-----------------------------------*/


            if($count->points <= 0)
            {
                if($AdditionalCount->AdditionalPoints >=$cost){
                    $AdditionalCount->AdditionalPoints = $AdditionalCount->AdditionalPoints - $cost;
                    DB::table('users')->where('id', $id)->update(['AdditionalPoints' => $AdditionalCount->AdditionalPoints]);
                    return $response;
                }
                else if($AdditionalCount->AdditionalPoints < $cost)
                {
                    if($request->ajax()) {
                        return response("not allowed, only Ajax requests");
                    } else {
                        return $response;
                    }

                    return $next($request);
                }
                else
                {
                    return redirect('/billing');
                }
            }
            else if($count->points >= $cost)
            {
                $count->points = $count->points - $cost;
                DB::table('users')->where('id', $id)->update(['points' => $count->points]);
                return $response;
            }
            else if($count->points < $cost && $count->points > 0)
            {
            	// Это он должен возвращать при том условии, что деньги закончились
		        /*return response()->view('dashboard.cross-sharing', array(
		        	'data'=>$this->content, 
		        	'data2'=>$content2, 
		        	'group_names'=>$group_names, 
		        	'moneyEnd' => true)
		        );*/

                $counts = $count->points - $cost;
                DB::table('users')->where('id', $id)->update(['points' => 0]);
                if($AdditionalCount->AdditionalPoints >= $counts)
                {
                    $AdditionalCount->AdditionalPoints = $AdditionalCount->AdditionalPoints + $counts;
                    DB::table('users')->where('id', $id)->update(['AdditionalPoints' =>  $AdditionalCount->AdditionalPoints]);
                    return $response;
                }
                else if($AdditionalCount->AdditionalPoints < $counts)
                {
                    return redirect('/billing');
                }
                else
                {
                    return redirect('/billing');
                }
            }
        }
    }
}