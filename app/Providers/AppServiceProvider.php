<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as HttpClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGuzzleService();

        $this->app->bind('Hybrid_Auth', function($app) {
            return new \Hybrid_Auth(config_path('hybridauth.php'));
        });

        $services = [
            'Contracts\Repositories\FacebookRepository' => 'Repositories\FacebookRepository',
            'Contracts\Repositories\FoursquareRepository' => 'Repositories\FoursquareRepository',
            'Contracts\Repositories\GithubRepository' => 'Repositories\GithubRepository',
            'Contracts\Repositories\LastFmRepository' => 'Repositories\LastFmRepository',
            'Contracts\Repositories\LinkedInRepository' => 'Repositories\LinkedInRepository',
            'Contracts\Repositories\LobRepository' => 'Repositories\LobRepository',
            'Contracts\Repositories\NytRepository' => 'Repositories\NytRepository',
            'Contracts\Repositories\PaypalRepository' => 'Repositories\PaypalRepository',
            'Contracts\Repositories\QuandlRepository' => 'Repositories\QuandlRepository',
            'Contracts\Repositories\SlackRepository' => 'Repositories\SteamRepository',
            'Contracts\Repositories\StripeRepository' => 'Repositories\StripeRepository',
            'Contracts\Repositories\TopicRepository' => 'Repositories\TopicRepository',
            'Contracts\Repositories\TumblrRepository' => 'Repositories\TumblrRepository',
            'Contracts\Repositories\TwilioRepository' => 'Repositories\TwilioRepository',
            'Contracts\Repositories\TwitterRepository' => 'Repositories\TwitterRepository',
            'Contracts\Repositories\UserRepository' => 'Repositories\UserRepository',
            'Contracts\Repositories\YahooRepository' => 'Repositories\YahooRepository',

            'Contracts\Interactions\AddTopicUser' => 'Interactions\AddTopicUser',
            'Contracts\Interactions\CreateTopic' => 'Interactions\CreateTopic',
        ];

        foreach ($services as $key => $value) {
            $this->app->singleton('App\\'.$key, 'App\\'.$value);
        }
    }
    
    private function registerGuzzleService()
    {
        $this->app->singleton(HttpClient::class, function() {
            return new HttpClient();
        });
    }


}
