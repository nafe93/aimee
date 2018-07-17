<?php

namespace App\Repositories;

use App\Topic;
use Carbon\Carbon;
use App\Contracts\Repositories\TopicRepository as TopicRepositoryContract;

class TopicRepository implements TopicRepositoryContract
{
    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Topic::with('owner', 'users')->where('id', $id)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function forUser($user)
    {
        return $user->topics()->with('owner')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function create($user, array $data)
    {
        return Topic::forceCreate([
            'owner_id' => $user->id,
            'name' => $data['name'],
        ]);
        
    }

}
