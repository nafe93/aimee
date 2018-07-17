<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\LinkedInRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Laravel\Spark\Spark;

class LinkedInController extends Controller
{

    /**
     * Return all data to the LinkedIn API dashboard
     * @return mixed
     */
    public function getPage(Request $request)
    {
        $this->setRequestOptions();

        Spark::interact(LinkedInRepository::class.'@', [$request->user()]);

        $relativeUrl = '/people/~:(firstName,lastName,emailAddress,pictureUrl,location,industry,numConnections,numConnectionsCapped,summary,publicProfileUrl)?format=json';

        $this->setGetResponse($relativeUrl);

        $userDetails = $this->getData();

        return view('api.linkedin')->withDetails($userDetails);
    }

}

