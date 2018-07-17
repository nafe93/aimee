<?php
// namespace App\Plugins;
use App\Repositories\AimeeLoggerRepository;

// The only thing we need is include base class file
require_once('FeedParser.php');


/**
* 
*/
class Feed extends FeedParser
{
	
	function __construct($argument)
	{
		# code...
	}


	public static function getRssDataByLastDatetime($url, $timestamp, $count = 5, $run_array)
	{

		try {

			$count = ($count <= 50) ? $count : 50;

			$log = new AimeeLoggerRepository();

			$user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
			
			if ($count <= 0) {
				throw new \Exception("An error occurred: a \"count\" can not be less than or equal zero and must be a number", 1);
			}

			$xml = file_get_contents($url);
			$feed = new FeedParser($xml);
			$items = $feed->getItems();
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_EXECUTING_GET_RSS_DATA_BY_LAST_DATETIME <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

			$result = [];


			foreach ($items as $item) {

				if (@$item->getPubDate()) {
	                $itemDateArray 	= date_parse_from_format("D, d M Y H:i:s O", $item->getPubDate());
	                $userDateString = date('n/j/Y', $timestamp);  
	                $itemDateString = date('n/j/Y', strtotime($itemDateArray['month'] . '/' . $itemDateArray['day'] . '/' . $itemDateArray['year']) );
	            } 
				
				if (@$item->getPubDate()) {

					// RSS-news with date, that smaller than user has define:
					if ( strtotime($itemDateString) > strtotime($userDateString)) {
						continue;
					} else {
						$arr = [
							'feed_title' => $item->getTitle(), 
							'feed_content' => $item->getContent(), 
							'feed_url' => $item->getLink(),
							'feed_pub_date' => $item->getPubDate(),
						];
						$result[] = $arr;
					}
				} else {
					print 'RSS-post don\'t show the date';
					print '<br>';
				}
				
			}

			return array_slice($result, 0, $count);
			
		} catch (\Exception $e) {
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_ERROR_GET_RSS_DATA_BY_LAST_DATETIME [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

			print 'Error when getting RSS data by last datetime: ' . $e->getMessage();
			print '<br>';
			if ( stristr($e->getMessage(), "Entity") || stristr($e->getMessage(), "such file") || stristr($e->getMessage(),"not known") ) {
            	throw new \Exception("Can't read RSS-feed by passed URL. Perhaps this is not a RSS-URL or is not correct", 1);
            }
			// We using cycles, because that we dont 'throw' Exception, but 'return' it
			return $e;
		}

	}



	public static function getRssDataByDate($url, $timestamp, $count = 5, $run_array)
	{
		try {

			$count = ($count <= 50) ? $count : 50;

			$log = new AimeeLoggerRepository();

			$user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
			
			if ($count <= 0) {

				throw new \Exception("An error occurred: a \"count\" can not be less or equal zero, and it must be a number", 1);

			} else {

				$xml = file_get_contents($url);
				$feed = new FeedParser($xml);
				$items = $feed->getItems();
	            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_EXECUTING_GET_RSS_DATA_BY_DATE <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

				$result = [];
				foreach ($items as $key => $item) {
					if ( $item->getPubDate() ) {


						// timestamp from the RSS-news item (with precision to day):
						// $pub_timestamp   = strtotime(date('n/j/Y', strtotime($item->getPubDate())));
						$pub_timestamp   = date('n/j/Y', strtotime($item->getPubDate()));
						// user defined timesamp:
						// $given_timestamp = strtotime(date('n/j/Y', $timestamp));
						$given_timestamp = date('n/j/Y', $timestamp);

						if ( $pub_timestamp != $given_timestamp ) {
							continue;
						} else {
							// print 'Pub == Given';
							$arr = [
								'feed_title' => $item->getTitle(), 
								'feed_content' => $item->getContent(), 
								'feed_url' => $item->getLink(),
								'feed_pub_date' => $item->getPubDate(),
							];
							$result[] = $arr;
						}

					} else {

						print 'This RSS feed does not show the date';
						print '<br>';

					}

				}

				return array_slice($result, 0, $count);

			}
			
		} catch (\Exception $e) {
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_ERROR_GET_RSS_DATA_BY_DATE [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");
			print 'Error while getting RSS data from url by date: ' . $e->getMessage();
			print '<br>';
			if ( stristr($e->getMessage(), "Entity") || stristr($e->getMessage(), "such file") || stristr($e->getMessage(),"not known") ) {
            	throw new \Exception("Can't read RSS-feed by passed URL. Perhaps this is not a RSS-URL or is not correct", 1);
            }
			return $e;
		}
	}



	/**
	 * [getRssDataFromUrlRandom description]
	 * @param  [type]  $url   [description]
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public static function getRssDataFromUrlRandom($url, $count = 10, $run_array)
	{

		try {

			$count = ($count <= 50) ? $count : 50;

			$log = new AimeeLoggerRepository();

			$user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
			
			if ($count <= 0) {

				throw new \Exception("An error occurred: a \"count\" can not be less or equal zero, and it must be a number", 1);

			} else {

				$xml = file_get_contents($url);
				$feed = new FeedParser($xml);
				$items = $feed->getItems();
	            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_EXECUTING_GET_RSS_DATA_FROM_URL_RANDOM <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

				$numbers = range(0, count($items) - 1); // get numbers range from 0 to items_quantity-1 
				shuffle($numbers); // randomize it

				// insert random items to result $arr within $count quantity
				
				$i = 0;
				$arr = [];
				foreach ($items as $item => $value) {

					if ($i >= $count) break;
					$arr[$i]['feed_title'] = $items[ $numbers[$i] ]->getTitle();
					$arr[$i]['feed_content'] = $items[ $numbers[$i] ]->getContent();
					$arr[$i]['feed_url'] = $items[ $numbers[$i] ]->getLink();
					$arr[$i]['feed_pub_date'] = $items[ $numbers[$i] ]->getPubDate();
					$i++;

				}

			}
			
			return $arr;
			
		} catch (\Exception $e) {
    
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_ERROR_GET_RSS_DATA_FROM_URL_RANDOM [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

			print 'Error when get random RSS data from url: ' . $e->getMessage() . '; ';
			print '<br>';

            if ( stristr($e->getMessage(), "Entity") || stristr($e->getMessage(), "such file") || stristr($e->getMessage(),"not known") ) {
            	throw new \Exception("Can't read RSS-feed by passed URL. Perhaps this is not a RSS-URL or is not correct", 1);
            }

			return $e;
		}
	}


	public static function getRssDataFromUrlByKeyword($url, $keywords, $count = 5, $run_array)
	{

		try {

			$count = ($count <= 50) ? $count : 50;

			$log = new AimeeLoggerRepository();

			$user_id = trim($run_array['user_id']);
            $source_acc = trim($run_array['source_account1']);
			
			if ($count <= 0) {
				throw new \Exception("An error occurred: a \"count\" can not be less or equal zero, and it must be a number", 1);
			} else {

				$xml = file_get_contents($url);
				$feed = new FeedParser($xml);
				$items = $feed->getItems();

	            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_EXECUTING_GET_RSS_DATA_FROM_URL_BY_KEYWORD <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

            	$keywords = array_slice( array_map('trim', explode(',', $keywords)), 0, 10);

				// foreach ($items as $item) {
				// 	dump($item->getTitle());
				// 	dump($item->getContent());
				// }
				// dd('');

				//echo '<b>Type:</b>' . $feed->getFeedType() . "<br/>";
				//echo '<b>Title:</b>' . $feed->getTitle() . "<br/>";
				//echo '<b>Description:</b>' . $feed->getDescription() . "<br/>";
				//echo '<b>Feed link:</b>' . $feed->getFeedLink() . "<br/>";
				//echo '<b>Link:</b>' . $feed->getLink() . "<br/>";

				// $i = 1;
				$result = [];
				foreach ($items as $item) {
					foreach ($keywords as $keyword) {
						
						if (stristr($item->getTitle() . " " . $item->getContent(), $keyword) === FALSE) {
							//	Is it needs to Log?
						} elseif (stristr($item->getTitle() . " " .  $item->getContent(), $keyword) != FALSE) {

							// dump('Key found');
							// dump($item->getTitle() . " " .  $item->getContent());

							//Because we have interface for items, we invoke interface methods
								//	echo "<h1>";
							//	if (is_empty($item->getLink()))
								//	echo '<a href="#">';
							//	else
								//	echo '<a href="' . $item->getLink() . '">';
						     //   $result[]=$item->getLink();
							//	$result[i].='\n';
							//	if (is_empty($item->getTitle()))
							 //   $result[i].= "No title";
							//		echo "No title";
							//else
								//echo "$i. " . $item->getTitle();
							//    $result[i].= $item->getTitle();
							//echo "</a>";

							//echo "</h1>";

							//if (is_empty($item->getPubDate()))
							//	echo "<i>" . "No date" . "</i><br/>";
							//else
							//	echo "<i>" . $item->getPubDate() . "</i><br/>";

							// if (is_empty($item->getContent()))
							// 		echo "<i>" . "No content" . "</i><br/>";
							// else
							// 		echo $item->getContent() . "<hr/>";
							// $arr['feeds'][$i]['feed_id'] = $row->feed_id;
							$arr = [
								'feed_title' => $item->getTitle(), 
								'feed_content' => $item->getContent(), 
								'feed_url' => $item->getLink(),
								'feed_pub_date' => $item->getPubDate(),
							];
							$result[] = $arr;

							// $arr['feeds'][$i]['cat_name'] = $this->get_catlist_details($row->feed_id);

						}
					}
				}

				$result = array_slice($result, 0, $count);
				return $result;

			}

		} catch (\Exception $e) {
            $log->WriteLog($user_id,$source_acc,$run_array['script_name'],$run_array['source_account1'],"METHOD_ERROR_GET_RSS_DATA_FROM_URL_BY_KEYWORD [Error: " . $e->getMessage() . "] <Line: " . __LINE__ .  "; File: " . __FILE__ .  "; Class: " . __CLASS__ .  "; Method: " . __METHOD__ .  "; Namespace: " . __NAMESPACE__ .  ">");

			print 'Error when get RSS data from url by keywords: ' . $e->getMessage();
			print '<br>';
			if ( stristr($e->getMessage(), "Entity") || stristr($e->getMessage(), "such file") || stristr($e->getMessage(),"not known") ) {
            	throw new \Exception("Can't read RSS-feed by passed URL. Perhaps this is not a RSS-URL or is not correct", 1);
            }
			return $e;
		}

		
	}

}


$TWITTER_get_rss_data_from_url_by_keyword = function($url,$keywords)
{
	
};

$TWITTER_get_rss_data_from_url_random = function($url,$count)
{
	
};


//$feeds = $TWITTER_get_rss_data_from_url_by_keyword("http://jn.nutrition.org/rss/mfr.xml",'Development');
//echo var_dump($go);


// $feeds=$TWITTER_get_rss_data_from_url_random("http://jn.nutrition.org/rss/mfr.xml",5);

// foreach ($feeds as $feed)
// {
// 	echo $feed['feed_title'];
// 	echo '<BR>';
// 	echo $feed['feed_url'];
// 	echo '<p>';
// }

?>
