<?php 
/**
 * Это заготовка для будущего скрипта, который должен парсить письмо и параметры,
 * сравнивать полученные значения, объединять их и затем совершать 
 * действия через GMail API
 *
 * This is a workaround for the future script, which should parse the letter 
 * and parameters, compare the values ​​obtained, merge them and then perform 
 * actions via the GMail API
 */
/*print_r('<pre>');


function parse_mail($mail_body = '') {
	$mail_body = 'This is a mail wroten by client_email:hello@gmail.com. My client is client_name:Bob. 
	This is a mail wroten by internal_code:h437h3j4i. My client is custom_id:custId-2371810. And red_cfg:red1.red05.red12.';
	$p = '/\S+:\S+/';
	preg_match_all($p, $mail_body, $matches);

	$vars = [];
	foreach ($matches[0] as $key => $val) {
		$vars[] = explode(':', trim($val, ".% \t\n\r\0\x0B"));
	}

	$result = [];
	foreach ($vars as $key => $val) {
		$result[$val[0]] = $val[1];
	}
	// print_r('<br>');
	// print_r($vars);

	return $result;	
}


function parse_params($params_body = '') {
	$params_body = 'custom_id:%cusid% internal_code:%incode% red_cfg:%red_var% client_email:%clemail%';

	$p = '/\S+:\S+/';
	preg_match_all($p, $params_body, $matches);

	foreach ($matches[0] as $val) {
		$arr = explode(':', $val);
		$vars[$arr[0]] = trim($arr[1], " \t\n\r\0\x0B%.");
	}

	return $vars;
}


function parsed_arr_merge($mail_body, $params_body)
{
	$result = [];
	$arr = [];
	foreach ($mail_body as $mail_key => $mail_val) {
		
		foreach ($params_body as $par_key => $par_val) {

			if ($par_key == $mail_key) {

				$arr[$par_val] = $mail_val;

			}

		}

	}

	return $arr;
}


$result = parsed_arr_merge( 
	parse_mail(), parse_params()
);

print_r($result);*/



/*$token_url = "https://graph.facebook.com/oauth/access_token_info?client_id="
		. $app_id . "&access_token=" . $access_token;

// Attempt to query the graph:
	$graph_url = "https://graph.facebook.com/oauth/access_token?"
		. "access_token=" . $access_token;
	$response = curl_get_file_contents($graph_url);
	$decoded_response = json_decode($response);



$access_token = $_REQUEST['access_token'];
  $graph_url = 'https://graph.facebook.com/oauth/access_token_info?'
      . 'client_id=YOUR_APP_ID&amp;access_token=' . $access_token;
  $access_token_info = json_decode(file_get_contents($graph_url));*/







 ?>