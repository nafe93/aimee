<?php

namespace App\Repositories;

use App\Contracts\Repositories\LinkedInRepository as LinkedInRepositoryContract;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class LinkedInRepository implements LinkedInRepositoryContract
{
    const LINKEDIN_API = 'https://api.linkedin.com/v1';

    /**
     * LinkedIn API base Url
     * @var string
     */
    protected $baseUrl;

    /**
     * Instance of Client
     * @var object
     */
    protected $client;

    /**
     *  Response from requests made to LinkedIn
     * @var mixed
     */
    protected $response;

    /**
     * Initialize the Controller with necessary arguments
     */
    public function __construct()
    {
        try {
            
            $this->baseUrl = self::LINKEDIN_API;
            $this->client = new Client(['base_uri' => $this->baseUrl]);
            
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }

    /**
     * Set options for making the Client request
     * @param string   $access_token
     * @return  void
     */
    public function setRequestOptions($access_token)
    {
        try {
        
            $authBearer = 'Bearer '. $access_token;
            $this->client = new Client(['base_uri' => $this->baseUrl,
                'headers' => [
                    'Authorization' => $authBearer,
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json'
                ]]);
            
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }

    /**
     * Get the response from API
     * @param string $relativeUrl
     */
    public function setGetResponse($relativeUrl)
    {
        try {

            $this->response = $this->client->get($this->baseUrl . $relativeUrl, []);
            
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }

    /**
     * Get the whole response from a get operation
     * @return array
     */
    public function getResponse()
    {
        try {
        
            return json_decode($this->response->getBody(), true);
            
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }

    /**
     * Get the data response from a get operation
     * @param string   $access_token
     * @return array
     */
    public function getData($access_token)
    {
        $this->setRequestOptions($access_token);

        // Can't access user news feed any longer
        // See https://developer.linkedin.com/support/developer-program-transition
        return [];
    }

    public function post($access_token, $messages) {
        try {

            $linkedIn=new \Happyr\LinkedIn\LinkedIn(env('LINKEDIN_CLIENT_ID'), env('LINKEDIN_CLIENT_SECRET'));
            $linkedIn->setAccessToken($access_token);

            foreach ($messages as $message) {
                $options = array('json'=>
                    array(
                        'comment' => $message,
                        'visibility' => array(
                            'code' => 'anyone'
                        )));

                $response = $linkedIn->post('v1/people/~/shares', $options);
                if (@$response['message']) {
                    print_r('LinkedIn: ' . $response['message']);
                }

            }
            
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }


    /**
     * [postRss description]
     * @param  [type] $access_token [description]
     * @param  [type] $messages     [description]
     * @return [type]               [description]
     */
    public function postRss($access_token, $messages) {

        try {
            
            $linkedIn=new \Happyr\LinkedIn\LinkedIn(env('LINKEDIN_CLIENT_ID'), env('LINKEDIN_CLIENT_SECRET'));
            $linkedIn->setAccessToken($access_token);

            foreach ($messages as $message) {

                $options = array('json'=>
                    array(
                        'content' => [
                            'title' => $message['feed_title'],
                            'description' => trim(strip_tags($message['feed_content'])),
                            'submitted-url' => $message['feed_url'],
                        ],
                        'comment' => $message['feed_title'],
                        'visibility' => array(
                            'code' => 'anyone'
                        )));

                $is_err = false;
                $one_success = false;
                // dump($linkedIn->post('v1/people/~/shares', $options));
                $result = $linkedIn->post('v1/people/~/shares', $options);
                if (@$result['message']) {
                    if (stristr($result['message'], 'Throttle limit for calls')) {
                        // throw new \Exception($result['message'], 1);
                        $is_err = 'Sorry. ' . $result['message'] . ' <span class="text-danger">Message not posted</span><br>';
                        echo($is_err);
                    }
                } elseif (@$result['updateUrl']) {
                    $one_success = true;
                    echo "RSS-feed <a class=\"link-output\" href=". $result['updateUrl'] .">message</a> <span class=\"text-success\">Succesfully posted!</span><br>";
                }
                
            }
            
            if ($one_success) 
                echo "<p>Links will activate after a few seconds</p>";
            if ($is_err) 
                throw new \Exception($is_err, 1);
            
        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }

    }



    public function postImages($access_token, $messages,$images) {
        try {

            $linkedIn=new \Happyr\LinkedIn\LinkedIn(env('LINKEDIN_CLIENT_ID'), env('LINKEDIN_CLIENT_SECRET'));
            $linkedIn->setAccessToken($access_token);
            //$comma_separated = implode("  ", $images);
            foreach ($messages as $message) {
                $options = array('json'=>
                    array(
                        'comment' => $message." ".$images,
                        'visibility' => array(
                            'code' => 'anyone'
                        )));

                print_r('LinkedIn post: ');
                $result = $linkedIn->post('v1/people/~/shares', $options);
                print_r($result["status"]." ");

            }
            //ManageUserLinkedInAccountsController@loginWithLinkedIn
            //print_r('End of life LinkedIn token');

        } catch (Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }



    public static function curlExecute($url) {

        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);

        if( ! $contents = curl_exec($c))
        {
            trigger_error(curl_error($c));
        }

        $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
        curl_close($c);

        if ($contents)
            return $contents;
        else
            return false;

    }

    public function update_linkedIn(){

        // Critical quantity of seconds to refresh the token:
        $critical = 86400;
        $id_user = Auth::id();
        $token = "AQUYsZSsmhiQrYpGn5TGMWKZOnqFdjPm3MsB3PTDUOX_1dNVO6Wa-YBWav940H60UiaIhefJU-h1X3lr3WUKMnORIpk0r2EUrcOKZ-tUQoES-AHTCm8kX6cRwxaGoZAFkSX0iDgWS4GXGT6e6Zu7_pDDU20vMxOx65P9DoTEiwT5163spzQ";
        $token_url = "https://www.linkedin.com/oauth/v2/accessToken?client_id=" . env('LINKEDIN_CLIENT_ID') . "&access_token=" . $token;

        $string_for_code = "http://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=77frwzjejfgd45&redirect_uri=http://aimee.video&state=987654321&scope=r_basicprofile";
        $string_for_token_info = "http://www.linkedin.com/oauth/v2/accessToken?grant_type=authorization_code&redirect_uri=http://localhost&client_id=77frwzjejfgd45&client_secret=mkJgAVpNDASsuiil&access_token=AQUYsZSsmhiQrYpGn5TGMWKZOnqFdjPm3MsB3PTDUOX_1dNVO6Wa-YBWav940H60UiaIhefJU-h1X3lr3WUKMnORIpk0r2EUrcOKZ-tUQoES-AHTCm8kX6cRwxaGoZAFkSX0iDgWS4GXGT6e6Zu7_pDDU20vMxOx65P9DoTEiwT5163spzQ";

        // $token_url = "https://graph.facebook.com/oauth/access_token_info?client_id="
        //         . env('FACEBOOK_CLIENT_ID') . "&access_token=" . $token;
        $response = self::curlExecute( $string_for_code );
        $response = json_decode($response);

        $x = var_dump($response);
        return($x);

        // $UserLinkedInAccount = new User_linkedin_accounts();
        // $account = $UserLinkedInAccount::getLinkedInAccountByToken($token);
        // $response->id_user_linkedin = $account->id_user_linkedin;
        // $response->user_linkedin_login = $account->user_linkedin_login;

//        $needRefresh = false;
//        // if $info->expires_in exists:
//        if (@$response->expires_in) {
//            $needRefresh = $critical > $response->expires_in; // diff in seconds
//        }
//
//        if ($needRefresh) {
//            return redirect()->action('ManageUserLinkedInAccountsController@loginWithLinkedIn');
//        } else {
//            return view('dashboard/home');
//        }


    }

}
