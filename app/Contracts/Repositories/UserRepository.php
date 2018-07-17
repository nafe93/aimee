<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/27/16
 * Time: 12:57 PM
 */

namespace App\Contracts\Repositories;


interface UserRepository
{

    /**
     * Handle Webhook request
     *
     * @param $user_id
     * @param $agent_id
     * @param $secret
     * @return
     */
    public function handle_request($user_id, $agent_id, $secret);

    /**
     * Update user location
     *
     * @param $user_id
     * @param $secret
     * @return
     */
    public function update_location($user_id, $secret);

    /**
     * Get a new user session
     *
     * @return
     */
    public function new_user_session();

    /**
     * Create a new user session
     *
     * @return
     */
    public function user_session();

    /**
     * Destroy a user session
     *
     */
    public function destroy_user_session();

    /**
     * Authorize with OmniAuth
     *
     */
    public function user_omniauth_authorize();

    /**
     * OmniAuth callback
     *
     */
    public function user_omniauth_callback();

    /**
     * Create a user password
     *
     */
    public function user_password();

    /**
     * Get the new user password
     *
     */
    public function new_user_password();

    /**
     * Edit a user password
     *
     */
    public function edit_user_password();

    /**
     * Cancel a user registration
     *
     */
    public function cancel_user_registration();

    /**
     * Create a user registration
     *
     */
    public function user_registration();

    /**
     * Get the new user registration
     */
    public function new_user_registration();

    /**
     * Edit the user registration
     *
     */
    public function edit_user_registration();

    /**
     * Delete the user registration
     *
     */
    public function delete_user_registration();

    /**
     * Unlock new user
     *
     */
    public function user_unlock();

    /**
     * Get the new user unlock
     *
     */
    public function new_user_unlock();
    

}