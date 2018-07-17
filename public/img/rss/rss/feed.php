<?php

// The only thing we need is include base class file
require_once('FeedParser.php');
$TWITTER_get_rss_data_from_url_by_keyword =function($url,$keywords)
{
// Get XML serialization of feed
$xml = file_get_contents($url);//"http://jn.nutrition.org/rss/mfr.xml");

// This is great. To work with feed we invoke only base class. All other work is 
// transparent.
$feed = new FeedParser($xml);

//Because we have interface for feeds, we invoke interface methods
//echo '<b>Type:</b>' . $feed->getFeedType() . "<br/>";
//echo '<b>Title:</b>' . $feed->getTitle() . "<br/>";
//echo '<b>Description:</b>' . $feed->getDescription() . "<br/>";
//echo '<b>Feed link:</b>' . $feed->getFeedLink() . "<br/>";
//echo '<b>Link:</b>' . $feed->getLink() . "<br/>";

$items = $feed->getItems();

// Stuff in your items can be empty, so you should somehow handle it.
// I've prepared is_empty function for you - enjoy.
$i = 1;

foreach ($items as $item) {
	//$string = 'Hello World!';
	if (stristr($item->getTitle(), $keywords) === FALSE) {
		//	echo '"earth" не найдена в строке';
	} else {

		if (stristr($item->getTitle(), $keywords) != FALSE)
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

		//if (is_empty($item->getContent()))
		//	echo "<i>" . "No content" . "</i><br/>";
		//else
		//	echo $item->getContent() . "<hr/>";
		//$arr['feeds'][$i]['feed_id'] = $row->feed_id;
		$arr[$i]['feed_title'] = $item->getTitle();
		$arr[$i]['feed_url'] = $item->getLink();
		//echo var_dump($arr);
		//$arr['feeds'][$i]['cat_name'] = $this->get_catlist_details($row->feed_id);
		$i++;
	}
}
return $arr;
};

$TWITTER_get_rss_data_from_url_random =function($url,$count)
{
$xml = file_get_contents($url);
$feed = new FeedParser($xml);
$items = $feed->getItems();
for($i=0;$i<$count;$i++)
{
	$r = rand(0,count($items));
	$arr[$i]['feed_title'] = $items[$r]->getTitle();
	$arr[$i]['feed_url'] = $items[$r]->getLink();
}
return $arr;

};
//$feeds = $TWITTER_get_rss_data_from_url_by_keyword("http://jn.nutrition.org/rss/mfr.xml",'Development');
//echo var_dump($go);
$feeds=$TWITTER_get_rss_data_from_url_random("http://jn.nutrition.org/rss/mfr.xml",5);

foreach ($feeds as $feed)
{
 echo $feed['feed_title'];
	echo '<BR>';
 echo $feed['feed_url'];
	echo '<p>';
}

?>
