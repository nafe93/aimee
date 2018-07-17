<?php
/**
 * Created by PhpStorm.
 * User: Zaitsev Sergei
 * Date: 10.03.17
 * Time: 20:25
 */

//$content = "your HTML content $here";
//$matches = NULL;
//$pattern = '/(?:http|https|ftp):\/\/\S+\.(?:jpg|jpeg)/';
//preg_match_all ($pattern, $content, $matches);


$ch = curl_init();
$what = $_GET["word"];
$curl_e = "https://everypixel.com/search?q=".$what."&page=1&media_type=0&stocks_type=free";
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,
    $curl_e
);
$content = curl_exec($ch);
$matches = NULL;
$pattern = '/(?:http|https|ftp):\/\/\S+\.(?:jpg|jpeg)/';
preg_match_all ($pattern, $content, $matches);

//var_dump($matches);
//echo $matches[3];
foreach($matches[0] as $match)
{
    echo "<img src=\"$match\" alt=\"альтернативный текст\">";
    echo "\n";
}


?>