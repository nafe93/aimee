<?php

namespace App\Repositories;

use App\Contracts\Repositories\TwilioRepository as TwilioRepositoryContract;
use Illuminate\Http\Request;
use Twilio;

class TwilioRepository implements TwilioRepositoryContract
{
    /**
     * Send a Text Message
     * @param  Request $request
     * @return string
     */
    public function sendTextMessage(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'number'  => 'required'
        ]);

        $number = $request->input('number');
        $message = $request->input('message') . ' #Aimee';

        Twilio::message($number, $message);

        return redirect()->back()->with('info', trans('texts.message.sent_success'));
    }

}
