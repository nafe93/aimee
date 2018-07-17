<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\FacebookRepository;
use App\Contracts\Repositories\LinkedInRepository;
use App\Contracts\Repositories\TumblrRepository;
use App\Contracts\Repositories\TwitterRepository;
use App\Contracts\Repositories\PaypalRepository;
use App\User;
use Illuminate\Console\Command;
use Laravel\Spark\Spark;

class Paypal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paypal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // For all users
        foreach (User::get() as $user) {

            $providers = $user->providers()->get();
            if ($providers->contains('name', 'paypal')) {
                // Get latest content
                $content = json_decode(Spark::interact(PaypalRepository::class.'@', [
                    $user->getAccessToken('paypal')
                ]));

                // Repost to facebook
                if ($providers->contains('name', 'facebook')) {
                    Spark::interact(FacebookRepository::class.'@post', [
                        $user->getAccessToken('facebook'), $content
                    ]);
                }

                // Repost to linkedin
                if ($providers->contains('name', 'linkedin')) {
                    Spark::interact(LinkedInRepository::class.'@post', [
                        $user->getAccessToken('linkedin'), $content
                    ]);
                }

                // Repost to tumblr
                if ($providers->contains('name', 'tumblr')) {
                    Spark::interact(TumblrRepository::class.'@post', [
                        $user->getAccessToken('tumblr'), $content
                    ]);
                }

                // Repost to twitter
                if ($providers->contains('name', 'twitter')) {
                    Spark::interact(TwitterRepository::class.'@sendTweet', [
                        $user->getAccessToken('twitter'), $user->getAccessTokenSecret('twitter'), $content
                    ]);
                }

            }

        }

    }
}
