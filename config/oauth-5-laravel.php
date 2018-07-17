<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',

	/**
	 * Consumers
	 */
	'consumers' => [
        'Twitter' => [
            'client_id'     => env('TWITTER_API_KEY'),
            'client_secret' => env('TWITTER_APP_SECRET'),
            // No scope - oauth1 doesn't need scope
        ],
        'Facebook' => [
            'client_id'     => env('FACEBOOK_CLIENT_ID'),
            'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
            'scope'         => ['email','public_profile','user_friends','publish_actions','manage_pages','publish_pages'],
        ],
        'Linkedin' => [
            'client_id'     => env('LINKEDIN_CLIENT_ID'),
            'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
            //'scope'         => ['email','public_profile','user_friends'],
            'redirect_uri' => env('LINKETDIN_CALLBACK_URL'),
        ],
        'Instagram' => [
            'client_id'     => env('INSTAGRAM_CLIENT_ID'),
            'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
            'redirect_uri'  => env('INSTAGRAM_CALLBACK_URL'),
            'scope' => ['basic'],
        ],
        'Google' => [
            'client_id'       => env('GOOGLE_CLIENT_ID'),
            'client_secret'   => env('GOOGLE_CLIENT_SECRET'),
            'approval_prompt' => 'force',
            'access_type'     => 'offline',
            'prompt'          => 'consent',
            'scope'           => ['profile','email','openid','https://mail.google.com/'],

        ],

    ]

];