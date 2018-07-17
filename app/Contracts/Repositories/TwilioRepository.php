<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


use Illuminate\Http\Request;

interface TwilioRepository
{
    /**
     * Send a Text Message
     * @param  Request $request
     * @return string
     */
    public function sendTextMessage(Request $request);

}