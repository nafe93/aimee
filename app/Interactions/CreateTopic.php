<?php

namespace App\Interactions;

use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Validator;
use App\Events\TopicCreated;
use App\Contracts\Repositories\TopicRepository;
use App\Contracts\Interactions\CreateTopic as Contract;
use App\Contracts\Interactions\AddTopicUser as AddTopicUserContract;

class CreateTopic implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function validator($user, array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        // Uncomment to constrain access to topics
        // $validator->after(function ($validator) use ($user) {
            // $this->validateMaximumTopicsNotExceeded($validator, $user);
        // });

        return $validator;
    }

    /**
     * Validate that the maximum number of topics hasn't been exceeded.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function validateMaximumTopicsNotExceeded($validator, $user)
    {
        if (! $plan = $user->sparkPlan()) {
            return;
        }

        if (is_null($plan->topics)) {
            return;
        }

        if ($plan->topics <= $user->topics()->count()) {
            $validator->errors()->add('name', 'Please upgrade your subscription to add more topics.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function handle($user, array $data)
    {
        event(new TopicCreated($topic = Spark::interact(
            TopicRepository::class.'@create', [$user, $data]
        )));

        Spark::interact(AddTopicUserContract::class, [
            $topic, $user, 'owner'
        ]);

    }
}
