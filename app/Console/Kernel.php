<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Facebook::class,
        Commands\Foursquare::class,
        Commands\Github::class,
        Commands\LastFm::class,
        Commands\LinkedIn::class,
        Commands\Lob::class,
        Commands\Nyt::class,
        Commands\Paypal::class,
        Commands\Quandl::class,
        Commands\Slack::class,
        Commands\Steam::class,
        Commands\Stripe::class,
        Commands\Tumblr::class,
        Commands\Twitter::class,
        Commands\Yahoo::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('facebook')->everyFiveMinutes();
        $schedule->command('foursquare')->everyFiveMinutes();
        // $schedule->command('github')->everyFiveMinutes();
        // $schedule->command('lastfm')->everyFiveMinutes();
        // $schedule->command('linkedin')->everyFiveMinutes();
        // $schedule->command('lob')->everyFiveMinutes();
        $schedule->command('nyt')->everyFiveMinutes();
        // $schedule->command('paypal')->everyFiveMinutes();
        $schedule->command('quandl')->everyFiveMinutes();
        // $schedule->command('slack')->everyFiveMinutes();
        // $schedule->command('steam')->everyFiveMinutes();
        // $schedule->command('stripe')->everyFiveMinutes();
        // $schedule->command('tumblr')->everyFiveMinutes();
        $schedule->command('yahoo')->everyFiveMinutes();
    }
}
