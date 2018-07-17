<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Provider;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Contracts\Auth\Guard;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $socialite;
    protected $auth;

    //public function __construct(Socialite $socialite, Guard $auth)
    public function __construct(Socialite $socialite, Guard $auth)
    {
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    public function authenticate(Request $request, $provider)
    {
        // Disable provider
        if ($request->user()->providers()->where('name', $provider)->first()) {
            $request->user()->providers()->detach($provider);

            return view('dashboard.accounts');
        }

        return $this->execute(($request->has('code') || $request->has('oauth_token')), $provider);
    }

    public function execute($hasRequest, $provider)
    {
        if (! $hasRequest) {
            $this->redirectToProvider($provider);
        }

        $user = $this->connectProvider($this->handleProviderCallback($provider), $provider);

    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return $this->socialite->driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = $this->socialite->driver($provider)->user();

        $user->token;
    }

    /**
     * Connect a provider
     *
     * @param $user
     * @param $provider
     *
     * @return \App\Provider
     */
    public function connectProvider($user, $name)
    {
        $provider = Provider::where('name', $name)->first();

        if (empty($provider))  {

            $provider = Provider::forceCreate([
                'name' => $name,
            ]);

        }

        $user->providers()->attach($provider, [
            'provider_id' => $name,
            'oauth_token' => $user->token,
            'oauth_token_secret' => property_exists($user, "tokenSecret") ? $user->tokenSecret : null,
        ]);

        return $provider;
    }

}
