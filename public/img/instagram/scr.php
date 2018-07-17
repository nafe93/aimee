<?php

function SendRequest($url, $post, $post_data, $user_agent, $cookies) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://instagram.com/api/v1/'.$url);
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    if($post) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    }

    if($cookies) {
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookies.txt');
    } else {
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies.txt');
    }

    $response = curl_exec($ch);
    $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return array($http, $response);
}

function GenerateGuid() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(16384, 20479),
        mt_rand(32768, 49151),
        mt_rand(0, 65535),
        mt_rand(0, 65535),
        mt_rand(0, 65535));
}

function GenerateUserAgent() {
    $resolutions = array('720x1280', '320x480', '480x800', '1024x768', '1280x720', '768x1024', '480x320');
    $versions = array('GT-N7000', 'SM-N9000', 'GT-I9220', 'GT-I9100');
    $dpis = array('120', '160', '320', '240');

    $ver = $versions[array_rand($versions)];
    $dpi = $dpis[array_rand($dpis)];
    $res = $resolutions[array_rand($resolutions)];

    return 'Instagram 4.'.mt_rand(1,2).'.'.mt_rand(0,2).' Android ('.mt_rand(10,11).'/'.mt_rand(1,3).'.'.mt_rand(3,5).'.'.mt_rand(0,5).'; '.$dpi.'; '.$res.'; samsung; '.$ver.'; '.$ver.'; smdkc210; en_US)';
}

function GenerateSignature($data) {
    return hash_hmac('sha256', $data, 'b4a23f5e39b5929e0666ac5de94c89d1618a2916');
}

function GetPostData($filename) {
    if(!$filename) {
        echo "The image doesn't exist ".$filename;
    } else {
        $post_data = array('device_timestamp' => time(),
            'photo' => '@'.$filename);
        return $post_data;
    }
}


function sendInstagramm($filename, $caption)
{
    $username = 'crazyhare86';
    $password = 'CyberAlphaUnity999';

    $agent = GenerateUserAgent();
    $guid = GenerateGuid();
    $device_id = "android-" . $guid;
    $data = '{"device_id":"' . $device_id . '","guid":"' . $guid . '","username":"' . $username . '","password":"' . $password . '","Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"}';
    $sig = GenerateSignature($data);
    $data = 'signed_body=' . $sig . '.' . urlencode($data) . '&ig_sig_key_version=4';
    $login = SendRequest('accounts/login/', true, $data, $agent, false);
    $text = '';

    if (strpos($login[1], "Sorry, an error occurred while processing this request.")) {
        $text .= "Request failed, there's a chance that this proxy/ip is blocked";
        return $text;
    }

    if (empty($login[1])) {
        $text .= "Empty response received from the server while trying to login";
        return $text;
    }
    $obj = @json_decode($login[1], true);
    var_dump($obj);

    if (empty($obj)) {
        $text .= "Could not decode the response" ;
        return $text;
    }
    $data = GetPostData($filename);
    $post = SendRequest('media/upload/', true, $data, $agent, true);

    if (empty($post[1])) {
        $text .= "Empty response received from the server while trying to post the image";
        return $text;
    }
    $obj = @json_decode($post[1], true);

    var_dump($obj);

    if (empty($obj)) {
        $text .= "Could not decode the response";
        return $text;
    }
    $status = $obj['status'];

    if ($status != 'ok') {
        $text .= "Status isn't okay";
        return $text;
    }

    $media_id = $obj['media_id'];
    $device_id = "android-" . $guid;

    $data = (object)array(
        'device_id' => $device_id,
        'guid' => $guid,
        'media_id' => $media_id,
        'caption' => trim($caption),
        'device_timestamp' => time(),
        'source_type' => '5',
        'filter_type' => '0',
        'extra' => '{}',
        'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
    );
    $data = json_encode($data);
    $sig = GenerateSignature($data);
    $new_data = 'signed_body=' . $sig . '.' . urlencode($data) . '&ig_sig_key_version=4';

    $conf = SendRequest('media/configure/', true, $new_data, $agent, true);

    if (empty($conf[1])) {
        $text .= "Empty response received from the server while trying to configure the image";
    } else {
        if (strpos($conf[1], "login_required")) {
            $text .= "You are not logged in. There's a chance that the account is banned";
        } else {
            $obj = @json_decode($conf[1], true);
            $status = $obj['status'];
            if ($status != 'fail') {
                $text .= "Success";
            } else {
                $text .= 'Fail';
            }
        }
    }
    return $text;
}


var_dump(sendInstagramm('fQ12YNqvDls.jpg', 'Title'));

?>