<?php

namespace App;

use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;

class User extends SparkUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider_id', 'provider',
        'avatar', 'gender', 'location', 'website', 'oauth_token', 'oauth_token_secret'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'date',
        'uses_two_factor_auth' => 'boolean',
    ];

    public function getAvatarUrl()
    {
        if(is_null($this->avatar)) {
            return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=mm&s=40";
        }

        return $this->avatar;
    }

    public function getAccessToken($provider)
    {
        return $this->providers()->where('name', $provider)->first()->pivot->oauth_token;
    }

    public function getAccessTokenSecret($provider)
    {
        return $this->providers()->where('name', $provider)->first()->pivot->oauth_token_secret;
    }

    /**
     * The providers that belong to the user.
     */
    public function providers()
    {
        return $this->belongsToMany(
            Provider::class, 'user_providers', 'user_id', 'provider_id')->withPivot('oauth_token', 'oauth_token_secret');
    }

    /**
     * The topics that belong to the user.
     */
    public function topics()
    {
        return $this->belongsToMany(
            Topic::class, 'user_topics', 'user_id', 'topic_id');
    }

}
