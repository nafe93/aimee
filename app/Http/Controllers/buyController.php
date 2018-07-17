<?php
/**
 * Created by PhpStorm.
 * User: nafe
 * Date: 12.05.2017
 * Time: 11:37
 */
namespace App\Http\Controllers;

use App\Console\Commands\Twitter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User_LinkedIn_Accounts;
use App\User_Instagram_Accounts;
use App\User_Google_accounts;
use App\User_facebook_accounts;
use App\User_twitter_accounts;
use App\User_scripts;
use App\Repositories\TwitterRepository;
use App\Repositories\AimeeLoggerRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Plugins\TwitterPlug;
use App\AddAndStartPlugin;
use App\ShedulStart\ShedulEntry;
use App\Repositories\FacebookRepository;
//use App\Contracts\Repositories\LinkedInRepository;
use App\Repositories\LinkedInRepository as LinkedInRepositoryContract;
use cloudinary\Cloudinary;
use cloudinary\Uploader;
use cloudinary\Api;
use Stripe\Stripe;
use premium\vendor\autoload;

class buyController extends Controller
{
    public $stripe = [
        'publishable' => 'pk_test_XlIgQyPsvXl0jLkgKq0KSrxx',
        'private' => 'sk_test_gLCNhbC3HIYDBAHwEJBQc1lf'
    ];

    public function views(){
        echo $this->stripe['publishable'];
    }


    public function saveToUsers(Request $request)
    {
        Stripe::setApiKey($this->stripe['private']);

        if(isset($_POST['stripeToken']))
        {
            $token = $_POST['stripeToken'];
            //echo $token;

            $email_server = DB::table("users")->where('id',Auth::id())->select('email')->first();
            $my_Email = "";
            foreach ($email_server as $value)
            {
                $my_Email = $value;
            }

            try
            {
                echo '<pre>'.print_r($token,true).'</pre>';

                \Stripe\Charge::create(array(
                    "amount" => $_POST['price']*100,
                    "currency" => "usd",
                    "source" => $token, // obtained with Stripe.js
                    "description" => $my_Email
                ));

                $check = Auth::check();
                $id = Auth::id();
                if($check){
                    if($_POST['boat_value'] == 1000){
                        DB::table("users")->where('id',$id)->update(
                            array('AccountType' => '1')
                        );
                    }
                    else if($_POST['boat_value'] == 2000){
                        DB::table("users")->where('id',$id)->update(
                            array('AccountType' => '2')
                        );
                    }
                    else if($_POST['boat_value'] == 3000){
                        DB::table("users")->where('id',$id)->update(
                            array('AccountType' => '3')
                        );
                    }
                    else if($_POST['boat_value'] == 4000){
                        DB::table("users")->where('id',$id)->update(
                            array('AdditionalPoints' => $_POST['price'] * 2)
                        );
                    }

                }
                return view('dashboard.billing');

            }catch (\Stripe_CardError $e){
                // DO some thing
                echo "Your pay did not go through" . $e;
            }
        }
                return view('dashboard.billing');
    }
}