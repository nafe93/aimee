<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\TumblrRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class TumblrController extends Controller
{
    /**
     * Return all data to the Tumblr API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $posts = Spark::interact(TumblrRepository::class.'@getPosts', [$request->user()]);

        return view('api.tumblr')->withPosts($posts);
    }
    
}
