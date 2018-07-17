<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\FacebookRepository;
use App\Contracts\Repositories\LinkedInRepository;
use App\Contracts\Repositories\NytRepository;
use App\Contracts\Repositories\TumblrRepository;
use App\Contracts\Repositories\TwitterRepository;
use App\User;
use Illuminate\Console\Command;
use Laravel\Spark\Spark;

class Twitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter';

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
            if ($providers->contains('name', 'twitter')) {
                // Get latest content
                $content = json_decode(Spark::interact(TwitterRepository::class.'@getLatestTweets', [
                    $user->getAccessToken('twitter'), $user->getAccessTokenSecret('twitter')
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
                        $user->getAccessToken('tumblr'), $user->getAccessTokenSecret('tumblr'), $content
                    ]);

                }


            }

        }
    }
}