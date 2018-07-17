<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'providers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function getAccessToken()
    {
        return $this->oauth_token;
    }

    public function getAccessTokenSecret()
    {
        return $this->oauth_token_secret;
    }

    /**
     * Get all of the users that belong to the provider.
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class, 'user_providers', 'provider_id', 'user_id'
        );
    }

}
