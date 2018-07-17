<?php

namespace App\Contracts\Repositories;

use App\Topic;

interface TopicRepository
{
    /**
     * Get the topic matching the given ID.
     *
     * @param  string|int  $id
     * @return Topic
     */
    public function find($id);

    /**
     * Get all of the topics for a given user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function forUser($user);

    /**
     * Create a new topic with the given owner.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $data
     * @return Topic
     */
    public function create($user, array $data);

}
