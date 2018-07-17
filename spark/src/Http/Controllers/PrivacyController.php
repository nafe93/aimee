<?php

namespace Laravel\Spark\Http\Controllers;

use Parsedown;
use Laravel\Spark\Spark;

class PrivacyController extends Controller
{
    /**
     * Show the privacy policy for the application.
     *
     * @return Response
     */
    public function show()
    {
        return view('spark::privacy', [
            'privacy' => (new Parsedown)->text(file_get_contents(base_path('privacy.md')))
        ]);
    }
}
