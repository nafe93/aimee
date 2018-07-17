<?php

namespace App\Events;

class TopicCreated
{
    /**
     * The topic instance.
     *
     * @var \App\Topic
     */
    public $topic;

    /**
     * Create a new event instance.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic = $topic;
    }
}
