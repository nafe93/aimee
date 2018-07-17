<?php

namespace App\Interactions;

use Laravel\Spark\Spark;
use App\Events\TopicUserAdded;
use App\Contracts\Interactions\AddTopicUser as Contract;

class AddTopicUser implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function handle($topic, $user, $role = null)
    {
        $topic->users()->attach($user, [
            'role' => $role ?: Spark::defaultRole()
        ]);

        event(new TopicUserAdded($topic, $user));



    }
}
