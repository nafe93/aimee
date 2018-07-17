<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Session;

class OauthController extends Controller
{
    protected $socialite;
    protected $auth;

    public function __construct(Socialite $socialite, Guard $auth)
    {
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    public function authenticate(Request $request, $provider)
    {
        if ($provider == 'twitter' || $provider == 'facebook' || $provider == 'linkedin' || $provider == 'google')
            return $this->execute(($request->has('code') || $request->has('oauth_token')), $provider);
    }

    public function execute($request, $provider)
    {
        if (! $request) {
            return $this->getAuthorizationFirst($provider);
        }

        $user = $this->findByProviderIdOrCreate($this->getSocialUser($provider), $provider);
        $this->auth->loginUsingId($user->id);

        return redirect('/accounts');
    }

    /**
     * Find a user by name or create a new user
     *
     * @param $userData
     * @param $provider
     *
     * @return \App\User
     */
    public function findByProviderIdOrCreate($userData, $provider)
    {
        $user = User::where('provider_id', '=', $userData->id)->first();

        Session::put('provider', $provider);

        $email = $this->isEmailExists($userData->getEmail()) ? null : $userData->getEmail();

        $name = $this->isUsernameExists($userData->getNickName()) ? null : $userData->getNickName();

        $tokenSecret = property_exists($userData, "tokenSecret") ? $userData->tokenSecret : null;

        if (empty($user))  {

            $user = User::create([
                'name'      => $name,
                'provider_id'   => $userData->getId(),
                'avatar'        => $userData->getAvatar(),
                'email'         => $email,
                'provider'      => $provider,
                'oauth_token'   => $userData->token,
                'oauth_token_secret'   => $tokenSecret
            ]);

            Session::put('provider', $provider);
        }

        return $user;
    }

    private function isUsernameExists($name = null)
    {
        $name = User::whereUsername($name)->first()['name'];

        return (! is_null($name)) ? true : false;
    }

    private function isEmailExists($email = null)
    {
        $email = User::whereEmail($email)->first()['email'];

        return (! is_null($email)) ? true : false;
    }

    /**
     * Check if the user's info needs updating
     * @param $userData
     * @param $user
     */
    public function checkIfUserNeedsUpdating($userData, $user)
    {
        $socialData = [
            'avatar' => $userData->getAvatar(),
            'name' => $userData->getNickName(),
        ];

        $dbData = [
            'avatar' => $user->avatar,
            'name' => $user->name,
        ];

        if (! empty(array_diff($dbData, $socialData))) {
            $user->avatar = $userData->getAvatar();
            $user->name = $userData->getNickName();
            $user->save();
        }
    }

    /**
     * Redirect the user to the Social Media Account authentication page
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorizationFirst($provider)
    {
        return $this->socialite->driver($provider)->redirect();
    }

    /**
     * Get Data from Social Media Account
     * @param  string $provider
     * @return collection
     */
    private function getSocialUser($provider)
    {
        $user = $this->socialite->driver($provider)->user();

        return $accessTokenResponseBody = $user->accessTokenResponseBody;
    }


    /**
     * Attach or detach a Social Media Provider
     * @param  \Illuminate\Http\Request $request
     * @param  string $name
     * @return collection
     */
    public function handle(Request $request, $name = null) {

        if ($name == null)
            $name = $request->segment(2);

        $provider = Provider::where('name', $name)->first();

        if (empty($provider)) {
            $provider = Provider::forceCreate([
                'name' => $name,
            ]);

        }

        if ($request->user()->providers()->where('provider_id', $provider->id)->exists()) {

            $request->user()->providers()->detach($provider);

        } else {

            if ($name == 'twitter' || $name == 'facebook' || $name == 'linkedin' || $name == 'google')
                $user = $this->socialite->driver($name)->user();

            $request->user()->providers()->attach($provider, [
                'provider' => $name,
                'oauth_token' => property_exists($user, "token") ? $user->token : null,
                'oauth_token_secret' => property_exists($user, "tokenSecret") ? $user->tokenSecret : null,
            ]);

        }

        return redirect('accounts');

    }
}