<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Session;


class OAuth
{
    protected $socialite;
    protected $auth;

    public function __construct(Socialite $socialite, Guard $auth)
    {
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $provider)
    {
        if (!$request->user()->providers()->where('name', $provider)->first()) {
            if ($provider == 'twitter' || $provider == 'facebook' || $provider == 'linkedin' || $provider == 'google') {
                return $this->socialite->driver($provider)->redirect();
            }

        }

        return $next($request);

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

}
