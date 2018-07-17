<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


use Illuminate\Http\Request;

interface SlackRepository
{
    /**
     * Get All Users on Your Team
     * @return array
     */
    public function getAllUsersOnYourTeam($count = null);

    /**
     * Send Message to Channel or Group
     * @param  Request $request
     * @return Session
     */
    public function sendMessageToTeam(Request $request);

}