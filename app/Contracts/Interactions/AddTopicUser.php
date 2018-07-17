<?php

namespace App\Contracts\Interactions;

interface AddTopicUser
{
    /**
     * Add a user to the given topic.
     *
     * @param  Topic  $topic
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $owner
     * @param  string|null  $role
     * @return Topic
     */
    public function handle($topic, $user, $role = null);
}
