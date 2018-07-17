<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Plugins\TwitterPlug;
use App\AddAndStartPlugin;
use App\User_scripts;
use App\post;

Route::get('/', 'WelcomeController@splash');


/*Route::get('/cross_post', function()
    {
        $headers = ['Content-type'=>'text/plain', 'test'=>'YoYo','X-BooYAH'=>'WorkyWorky','Content-Length'=>"12"];
        return Response::make("File sending", 200, $headers);
    });*/




Route::get('/post/{id}', function ($id){
    post::POST($id);
});

Route::get('/pos', function (){
    $id = $_POST["id"];
    $cScript = new User_scripts();
    $cScript = $cScript::getScriptStrategy($id);
    AddAndStartPlugin::StartPlugin($cScript);
});

/* --- Sessions block --- */
Route::post('/save_rss_user_params', 'SessionController@saveRssSession')->middleware('web');
Route::post('/save_action_user_params', 'SessionController@saveActionSession')->middleware('web');
Route::post('/get_session_user_params', 'SessionController@getActionsSession')->middleware('web');
Route::post('/del_rss_session', 'SessionController@removeActionsSessionData')->middleware('web');

Route::group(['middleware' => ['web']], function () {

    Route::get('/accounts', 'HomeController@accounts');
    Route::get('/home', 'HomeController@home');

    Route::get('/api', [
        'as' => 'accounts', 'uses' => 'PageController@api'
    ]);

    Route::get('/content/index', [
        'uses' => 'ContentController@index',
        'middleware' => 'subscribed:default,basic,pro'
        ]);

    Route::get('/content', [
        'uses' => 'ContentController@create',
        'middleware' => 'subscribed:default,basic,pro'
    ]);

    Route::post('/content', [
        'uses' => 'ContentController@store',
        'middleware' => 'subscribed:default,basic,pro'
    ]);

    Route::get('/content/show', [
        'uses' => 'ContentController@show',
        'middleware' => 'subscribed:default,basic,pro'
    ]);

    Route::get('/content/edit', [
        'uses' => 'ContentController@edit',
        'middleware' => 'subscribed:default,basic,pro'
    ]);

    Route::put('/content', [
        'uses' => 'ContentController@update',
        'middleware' => 'subscribed:default,basic,pro'
    ]);

    Route::delete('/content/{topic}', [
        'uses' => 'ContentController@unsubscribe',
        'middleware' => 'subscribed:default,basic,pro'
    ]);


    Route::get('/analytics', [
        'uses' => 'HomeController@analytics',
    ]);

    Route::group(['prefix' => 'accounts'], function () {
        Route::get('nyt', [
            'uses' => 'NytController@getPage',
            'as'   => 'api.nyt'
        ]);

        Route::get('twilio', [
            'uses' => 'TwilioController@getPage',
            'as'   => 'api.twilio',
        ]);

        Route::post('twilio', [
            'uses' => 'TwilioController@sendTextMessage',
        ]);

        Route::get('scraping', [
            'uses' => 'WebScrapingController@getPage',
            'as'   => 'api.scraping'
        ]);

        Route::get('yahoo', [
            'uses' => 'YahooController@getPage',
            'as'   => 'api.yahoo',
            'middleware' => ['oauth']
        ]);

        Route::get('clockwork', [
            'uses' => 'ClockworkController@getPage',
            'as'   => 'api.clockwork',
        ]);

        Route::post('clockwork', [
            'uses' => 'ClockworkController@sendTextMessage'
        ]);

        Route::get('quandl', [
            'uses' => 'QuandlController@getPage',
            'as'   => 'api.quandl',
        ]);

    });

    // OAuth
    Route::group(['prefix' => 'accounts'], function() {
        Route::get('github', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.github',
            'middleware' => 'oauth:github'
        ]);

        Route::get('twitter', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.twitter',
            'middleware' => 'oauth:twitter'
        ]);

        Route::post('/tweet/new', [
            'uses' => 'TwitterController@sendTweet',
            'as'   => 'tweet.new',
            'middleware' => 'oauth:twitter'
        ]);

        Route::get('lastfm', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.lastfm',
            'middleware' => 'oauth:lastfm'
        ]);

        Route::get('steam', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.steam',
            'middleware' => 'oauth:steam'
        ]);

        Route::get('stripe', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.stripe',
            'middleware' => 'oauth:stripe'
        ]);

        Route::get('paypal', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.paypal',
            'middleware' => 'oauth:paypal'
        ]);

        Route::get('aviary', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.aviary',
            'middleware' => 'oauth:aviary'
        ]);

        Route::get('lob', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.lob',
            'middleware' => 'oauth:lob'
        ]);

        Route::get('slack', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.slack',
            'middleware' => 'oauth:slack'
        ]);

        Route::post('/slack/message', [
            'uses' => 'OauthController@handle',
            'as'   => 'slack.message',
            'middleware' => 'oauth:slack'
        ]);

        Route::get('facebook', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.facebook',
            'middleware' => 'oauth:facebook'
        ]);

        Route::get('linkedin', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.linkedin',
            'middleware' => 'oauth:linkedin'
        ]);

        Route::get('foursquare', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.foursquare',
            'middleware' => 'oauth:foursquare'
        ]);

        Route::get('instagram', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.instagram',
            'middleware' => 'oauth:instagram'
        ]);

        Route::get('tumblr', [
            'uses' => 'OauthController@handle',
            'as'   => 'api.tumblr',
            'middleware' => 'oauth:tumblr'
        ]);

    });

    /** For avatar images */
    Route::get('storage/profiles/{filename}', function ($filename)
    {
        $path = storage_path('app/public/profiles/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });

    Route::get('/user', 'HomeController@user');
    Route::get('/security', 'HomeController@security');
    Route::get('/user_social_accounts', 'HomeController@user_social_accounts');
    Route::get('/jobs_strategy', 'HomeController@jobs_strategy');
    Route::post("/jobs_strategy/check_rss", "RSSController@checkRssLink");
    // Route::get('/user_tickets', 'HomeController@user_tickets');
    Route::get('/billing', 'HomeController@billing');
    // Route::get('/notifications', 'HomeController@notifications');
    Route::get('/cross-sharing-creat_group', 'CrossSheringController@creat_group');
    Route::get('/cross-sharing-select_groups', 'CrossSheringController@select_groups');
    Route::get('/cross-sharing-edit_groups', 'CrossSheringController@edit_groups');
    Route::get('/cross-sharing-edit_to_groups', 'CrossSheringController@edit_to_groups');
    Route::get('/cross-sharing-rename', 'CrossSheringController@rename');
    Route::get('/cross-sharing-cs_delete', 'CrossSheringController@cs_delete');
    Route::get('/cross-sharing-get_all', 'CrossSheringController@get_all');
    Route::get('/get_all_twitter', 'CrossSheringController@get_all_twitter');

    Route::post('/cross-sharing-crossSharingNow', 'CrossSheringController@crossSharingNow')->middleware('CostAJAX');
    Route::get('/cross-sharing', 'CrossSheringController@show');
    Route::post('/save_user_sync', 'CrossSheringController@saveUserSync');

    Route::post('/cross-sharing-saveToDB', 'CrossSharingAtTime@saveToDB');
    Route::any('/buy_points', 'buyController@saveToUsers');
    Route::post('/key_points', 'buyController@views');
    Route::get('/cross_post', "CrossSharingAtTime@cs_atTime");
    Route::get('/analytics_simple_best_tweets',"CrossSheringController@cs_get_best_20_twitter");

    Route::post('/home/mail-to-support', 'SupportController@sendEmailThruSmtp');
// master
    Route::post('/home/send-mail', function()
    {
        echo 'Hello';
    })->name('send-mail');
// master
// maks_2
    Route::any('/some_email', function(){ return view('some_email'); });
// maks_2
    
        

/*
    Route::get('/cross-sharing-creat_group', 'CrossSheringController@creat_group');
    Route::get('/cross-sharing-select_groups', 'CrossSheringController@select_groups');
//    Route::get('/cross-sharing', function() { echo 'Hello world';});

    Route::get('/cross-sharing-example', 'CrossSheringController@example');
    Route::get('/cross-sharing', function() { echo 'Hello world';});

*/
    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    // Social Authentication
//    Route::get('/auth/{provider}', 'OauthController@authenticate');
//    Route::get('/auth/{provider}/callback', 'OauthController@handle');

    Route::get('authLinkedin', [
        'uses' => 'ManageUserLinkedInAccountsController@loginWithLinkedIn',
        'as'   => 'api.user_linkedin'
    ]);

    //Add user twitter accounts
    //Route::post('/call_to_add_twitter_account', 'ManageUserTwitterAccountsController@postAddTwitterAccount');
    Route::get('authTwitter', [
        'uses' => 'ManageUserTwitterAccountsController@loginWithTwitter',
        'as'   => 'api.user_twitter'
    ]);

    //Add user instagram accounts
    Route::get('authInstagram', [
        'uses' => 'ManageUserInstagramAccountsController@loginWithInstagram',
        'as'   => 'api.user_instagram'
    ]);
    //Show user twitter secret key
    Route::post('/call_to_show_twitter_secret_token', 'ManageUserTwitterAccountsController@postShowTwitterSecretToken');

    //Open modal window to edit account
    //::post('/call_open_modal_window_edit_twitter_account', 'ManageUserTwitterAccountsController@openModalWindowEditTwitterAccount');
    //Edit user twitter account
    //Route::post('/call_edit_twitter_account', 'ManageUserTwitterAccountsController@postEditTwitterAccount');
    //Open modal window to delete twitter account
    Route::post('/call_open_modal_window_delete_twitter_account', 'ManageUserTwitterAccountsController@openModalWindowDeleteTwitterAccount');
    //Delete user twitter account
    Route::post('/call_delete_twitter_account', 'ManageUserTwitterAccountsController@postDeleteTwitterAccount');
    //Post tweets
    Route::post('/post_tweet', 'ManageUserTwitterAccountsController@postTweetFromUser');

    //Add job
    Route::get('/add_job', 'JobsController@addJob');

    //Authorization user facebook account
    Route::get('/authFacebook', [
        'uses' => 'ManageUserFacebookAccountsController@loginWithFacebook',
        'as'   => 'api.user_facebook'
    ]);

    //Authorization user google account
    Route::get('authGoogle', [
        'uses' => 'ManageUserGoogleAccountsController@loginWithGoogle',
        'as'   => 'api.user_google'
    ]);
    //Show user facebook secret key
    Route::post('/call_to_show_facebook_secret_token', 'ManageUserFacebookAccountsController@postShowFacebookSecretToken');
    //Open modal window to delete facebook account
    Route::post('/call_open_modal_window_delete_facebook_account', 'ManageUserFacebookAccountsController@openModalWindowDeleteFacebookAccount');
    //Delete user facebook account
    Route::post('/call_delete_facebook_account', 'ManageUserFacebookAccountsController@postDeleteFacebookAccount');
    //Post facebook
    Route::post('/post_facebook', 'ManageUserFacebookAccountsController@postFacebookFromUser');

    Route::post('/call_open_modal_window_delete_linkedin_account', 'ManageUserLinkedInAccountsController@openModalWindowDeleteLinkedInAccount');
    //Delete user facebook account
    Route::post('/call_delete_linkedin_account', 'ManageUserLinkedInAccountsController@postDeleteLinkedInAccount');

    //Show user linkedin secret key
    Route::post('/call_to_show_linkedin_secret_token', 'ManageUserLinkedInAccountsController@postShowLinkedInSecretToken');

    //Show user instagram secret key
    Route::post('/call_to_show_instagram_secret_token', 'ManageUserInstagramAccountsController@postShowInstagramSecretToken');
    //Open modal window to delete instagram account
    Route::post('/call_open_modal_window_delete_instagram_account', 'ManageUserInstagramAccountsController@openModalWindowDeleteInstagramAccount');
    //Delete user instagram account
    Route::post('/call_delete_instagram_account', 'ManageUserInstagramAccountsController@postDeleteInstagramAccount');

    //Show user google secret key
    Route::post('/call_to_show_google_secret_token', 'ManageUserGoogleAccountsController@postShowGoogleSecretToken');
    //Open modal window to delete google account
    Route::post('/call_open_modal_window_delete_google_account', 'ManageUserGoogleAccountsController@openModalWindowDeleteGoogleAccount');
    //Delete user google account
    Route::post('/call_delete_google_account', 'ManageUserGoogleAccountsController@postDeleteGoogleAccount');

    //Jobs - select accounts under social network
    Route::post('/post_show_accounts_under_social_network', 'JobsController@postShowAccountsUnderSocialNetwork');

    Route::post('/loadscript', 'JobsController@LoadScript');
//
//    //Jobs - modal window to add parameters
//    Route::post('/call_modal_to_add_scripts_parameters', 'JobsController@modalToAddScriptsParameters');

    //Jobs - show script description
    Route::post('/call_get_script_description_and_parameters', 'JobsController@GetScriptDescriptionAndParameters');


    Route::post('/call_get_full_description', 'JobsController@modalToAddScriptsParameters');

    //Jobs - save user script
    Route::post('/save_user_script', 'JobsController@saveUserScript');

    //Jobs - delete user script
    Route::post('/call_delete_user_script_data', 'JobsController@deleteUserScriptData');
    Route::get('/postcall', 'SheduleRecieverController@Start');


    Route::post('/stop_job', 'JobsController@StopJob');
    Route::post('/renewal_job', 'JobsController@RenewalJob');
    Route::post('/get_actions_list', 'JobsController@getStrategyListData');

    Route::post('/plugins/{NamePlagin}/{Param}', function ($NamePlagin,$Param){
        $rout = new AddAndStartPlugin();
        URL::setRootControllerNamespace('App\Http\Controllers');
        return redirect()->action($rout->GetRout($NamePlagin),[$Param]);
    });

});

    // http://localhost/auth/facebook/callback?code=AQAModMkdFYbq42a_ssRdPLvjIl-UBsuI6MAUQ91w81lySPCk3RU_8z13glI6GmDKocC8I8pqQpPJWfqJc2N09b4ivOONo08Qk__QNLwzUeIRH1H4lge4FsK_pdMjUK59ihgz4qQWxvq4WcjXs0NwzYlpnscJkAtoonwjYSHweMZHZ3APPmGfJa4oO-7bYpc3nL7aymKARpTyYgvgRhCoMTCDIQB8GsBrNUxejjs0_TjW6lETDr1fVNgiiJztNymJbyaSwFcNXAldDo3-VbeGZtcRWdc76KlAKTvih3s7e6GrfBJ8gsHlN1FvHaJw9lyWJnAGG6ScJoSiY7LfR9ix3Jb#_=_
    Route::any('/auth/facebook/callback', [
        'as' => 'fb.callback', 
        'uses' => 'CrossSheringController@fbCallback'
    ]);
/*Route::group(['prefix' => 'auth'], function() {
    Route::get('login', 'AuthenticateController@login');
    Route::get('endpoint', 'AuthenticateController@endpoint');
    Route::get('logout', 'AuthenticateController@logout');
});
*/
