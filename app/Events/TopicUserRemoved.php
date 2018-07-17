<?php

namespace App\Events;

class TopicUserRemoved
{
    /**
     * The topic instance.
     *
     * @var \App\Topic
     */
    public $topic;

    /**
     * The topic user instance.
     *
     * @var mixed
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  \App\Topic  $topic
     * @param  mixed  $user
     * @return void
     */
    public function __construct($topic, $user)
    {
        $this->topic = $topic;
        $this->user = $user;
    }
}
