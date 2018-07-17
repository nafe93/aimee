<?php
/**
 * Top nav for user account
 * User: Fishouk.Alexey
 * Date: 21.11.2016
 * Time: 14:12
 */
?>

<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="navbar-username" href="#">{{ Auth::user()->name ? Auth::user()->name : Auth::user()->email }}</a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="" class="support-modal" data-toggle="support-modal" data-target="#supportModal" class="aimee-link-color">
                        Support
                    </a>
                </li>
                <li>
                    <a href="/logout" class="aimee-link-color">
                        Log out
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

@php
    $test = DB::table("users")->where('id',Auth::id())->select('AccountType')->first();
    foreach ($test as $value)
    {
        /*if($value == "1"){
            echo "You are 1";
        }
        else if($value == "2"){
            echo "You are 2";
        }
        else if($value == "3"){
            echo "You are 3";
        }
         else if($value == "4"){
            echo "You are 4";
        }
        else {
            echo "you are not prime";
        }*/
    }
@endphp
