<?php

namespace App\Repositories;

use App\Contracts\Repositories\SlackRepository as SlackRepositoryContract;
use Illuminate\Http\Request;
use SlackUser;
use SlackChat;

class SlackRepository implements SlackRepositoryContract
{
    /**
     * Get All Users on Your Team
     * @return array
     */
    public function getAllUsersOnYourTeam($count = null)
    {
        $list = (array)SlackUser::lists();

        if (is_null($count)) {
            return $list['members'];
        }

        return array_slice($list['members'], 0, $count);
    }

    /**
     * Send Message to Channel or Group
     * @param  Request $request
     * @return Session
     */
    public function sendMessageToTeam(Request $request)
    {
        $this->validate($request, [
            'message'  => 'required'
        ]);

        $message = $request->input('message') . ' #Aimee :smile:';

        SlackChat::message('#general', $message);

        return redirect()->back()->with('info', trans('texts.message.sent_success'));
    }

}
