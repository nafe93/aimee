<?php

namespace App\Providers;

use Laravel\Spark\Exceptions\IneligibleForPlan;
use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Aimee',
        'product' => 'Aimee',
        'street' => '',
        'location' => '',
        'phone' => '',
        'email' => 'info@getaimee.com'
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;
    // protected $sendSupportEmailsTo = "rainy_dream@mail.ru";

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        //
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        // To enable team billing add trait CanJoinTeams; to User.php
        // and return this.billableType && this.billableType == 'user'; to mixin.js:billingUser()

        Spark::useTwoFactorAuth();

        // Spark::useStripe()->noCardUpFront()->trialDays(10);

        Spark::useStripe();

        Spark::plan('Free', 'free')
            ->features([
                'Test function',
            ]);

        Spark::plan('Starter', 'starter')
            ->price(10)
            ->features([
                'Cross-network sharing'
            ]);

        Spark::plan('Basic', 'basic')
            ->price(20)
            ->features([
                'Cross-network sharing', 'Content aggregation'
            ]);

        Spark::plan('Pro', 'pro')
            ->price(30)
            ->features([
                'Cross-network sharing', 'Content aggregation', 'Analytics'
            ]);

    }
}
