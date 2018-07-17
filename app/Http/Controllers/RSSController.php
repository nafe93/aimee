<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\TwitterRepository;
use Auth;
use Laravel\Spark\Spark;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
require_once str_replace("public","",$_SERVER['DOCUMENT_ROOT']) . "/app/Plugins/rss_old/FeedParser.php";

class RSSController extends Controller
{
    

    public function checkRssLink(Request $request)
    {
    	try {

    		$rss_url = $request->url;
    		$url = parse_url($request->url);

			if(@$url['scheme']) {
				$rss_url;
			}
			else {
				$rss_url = "http://" . $rss_url;
			}

    		$content = file_get_contents($rss_url); 
		   	$rss = new \SimpleXmlElement($content);

		   	if (!isset($rss->channel->item) && $rss->channel->item->count() <= 0) {
				return response()->json( ["result" => false ,"message" => "This is not a RSS-feed URL or this URL is not correct"] );
		   	} else {
				return response()->json( ["result" => true ,"message" => "URL is correct"] );
		   	}

    		/* 
    		$url = $request->url;
    		if (!stristr($request->url, "http://") || !stristr($request->url, "https://")) {
    			$url = "http://" . $request->url;
    		}
			
			$xml = file_get_contents($request->url);
			$feed = new \FeedParser($xml);
			// $items = $feed->getItems();

			if ($feed) {
				// print_r( ["response" => "URL is correct"] );
				return response()->json( "URL is correct" );
			}
			*/

		} catch (\Exception $e) {
			
			if ( stristr($e->getMessage(), "no name in Entity") || stristr($e->getMessage(), "could not be parsed") || stristr($e->getMessage(), "not known") ) {
				// print_r( ["response" => "This is not a RSS-link or URL is not correct"] );
				return response()->json( ["result" => false, "message" => "This is not a RSS-feed URL or this URL is not correct"] );
			} else {
				// print_r( ["response" => $e->getMessage()] );
				return response()->json( ["result" => false, "message" => $e->getMessage()] );
			}

		}
    }



}
