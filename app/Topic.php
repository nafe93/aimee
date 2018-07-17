<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Spark\Spark;

class Topic extends Model
{
    /**
     * Get the owner of the topic.
     */
    public function owner()
    {
        return $this->belongsTo(Spark::userModel(), 'owner_id');
    }

    /**
     * Get all of the users that belong to the topic.
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class, 'user_topics', 'topic_id', 'user_id'
        );
    }

}
