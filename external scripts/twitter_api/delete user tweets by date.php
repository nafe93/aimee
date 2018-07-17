<?php 
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	require "twitteroauth-0.7.2/autoload.php"; //abraham autload libs

	use Abraham\TwitterOAuth\TwitterOAuth;//abraham lib to connect twitter

	function delete_all_user_tweets_by_date($date_to_delete_tweets, $consumer_key, $consumer_secret, $access_token, $access_token_secret)
	{
		$date_to_delete_tweets = $date_to_delete_tweets; // for test put here date
		$date_to_delete_tweets = strtotime($date_to_delete_tweets);//date.month.year to time format without hours, minutes, seconds 

		$consumer_key = $consumer_key;//twitter app api key
		$consumer_secret = $consumer_secret;//twitter app api key
		$access_token = $access_token;//twitter user api key
		$access_token_secret = $access_token_secret;//twitter user api key

		$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);//connect to twitter
		$user = $connection->get("account/verify_credentials");//get user info and access
		$user_id = $user->id_str;//user twitter id
		$screen_name = $user->screen_name;//user twitter login

		$tweets = $connection->get("statuses/user_timeline", ["user_id" => $user_id, "screen_name" => $screen_name]);//array pf all user tweets
		
		foreach ($tweets as $tweet) {			
			$date_of_tweet = strtotime($tweet->created_at);//date.month.year to time format with hours, minutes, seconds 
			$date_of_tweet = date('d.m.Y', $date_of_tweet); //date.month.year without hours, minutes, seconds  
			$date_of_tweet = strtotime($date_of_tweet);//date.month.year to time format without hours, minutes, seconds 
			$result =  $date_of_tweet - $date_to_delete_tweets;//get tweets we need
			if ($result >= 0) {
				$connection->post("statuses/destroy", ["id" => $tweet->id]);//delete tweet by tweet id
				echo "Delete tweet with id " . $tweet->id . " succes</br>";//test show
			}
		}
	}	
?>