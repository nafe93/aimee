<?php
/**
 * Created by PhpStorm.
 * User: zaitsev
 * Date: 14.03.2017
 * Time: 15:31
 */

namespace App\Repositories;

use App\User_Google_accounts;
use Illuminate\Support\Facades\DB;
// use Illuminate\Exception;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GoogleRepository
{

    /**
     * [RefreshIfExpire description]
     * @param [type] $user_id      [description]
     * @param [type] $user_account [description]
     */
    public function RefreshIfExpire($user_id,$user_account)
    {

        try {
            

            $data = DB::table('user_google_accounts')
                ->select('google_access_token')
                ->where('id_user', $user_id)
                ->where('user_google_name', $user_account)
                ->get();
            $access_token = $data[0]->google_access_token;

            $data_ref = DB::table('user_google_accounts')
                ->select('refresh_token')
                ->where('id_user', $user_id)
                ->where('user_google_name', $user_account)
                ->get();
            $refresh_token = $data_ref[0]->refresh_token;

            $client = new \Google_Client();
            $client->setAuthConfig(env('GOOGLE_JSON_DATA'));
            $AObj = json_decode($data[0]->google_access_token);

            $url = 'https://www.googleapis.com/oauth2/v1/tokeninfo?access_token='.$AObj->{'access_token'};
            $ch = curl_init();
            $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            );
            curl_setopt_array($ch, $optArray);
            $result = curl_exec($ch);
            $response   =   json_decode($result);
            // var_dump($response);

            if(isset($response->issued_to))
            {
                return true;
            }
            else if(isset($response->error))
            {
                $client = new \Google_Client();
                $client->setAuthConfig(env('GOOGLE_JSON_DATA'));
                $new_token =  $client->refreshToken($refresh_token);
                $google_access_token = \GuzzleHttp\json_encode($new_token);
               // $new_token_write = json_decode($google_access_token);
                User_Google_accounts::refreshTokenGoogleAccount($user_id,$user_account,$google_access_token);
                return $google_access_token;
            }
            
        } catch (\Exception $e) {

            
            print 'An error occurred while refreshing your GMail token: ' . $e->getMessage();
            print '<br>';
            throw $e;
            // exit;
        } 

    }

    /**
     * Get list of Messages in user's mailbox.
     *
     * @param  Google_Service_Gmail $service Authorized Gmail API instance.
     * @param  string $userId User's email address. The special value 'me'
     * can be used to indicate the authenticated user.
     * @return array Array of Messages.
     */
    function listMessages($service, $userId, $param) {

        try {
            
            $pageToken = NULL;
            $messages = array();
            $q = 'from:' . $param->From . ' subject:(' . $param->Subject . ')';
            $opt_param = array(
                // 'maxResults' => '5', 
                'q' => $q,
            );

            /* maks_2: uncomment this, if needs get all messages from GMail: */
            // do {
                try {
                    if ($pageToken) {
                        $opt_param['pageToken'] = $pageToken;
                    }
                    $messagesResponse = $service->users_messages->listUsersMessages($userId, $opt_param);
                    if ($messagesResponse->getMessages()) {
                        $messages = array_merge($messages, $messagesResponse->getMessages());
                        $pageToken = $messagesResponse->getNextPageToken();
                    }
                } catch (\Exception $e) {
                    print 'An error occurred while getting messages from your GMail: ' . $e->getMessage() . '<br>';
                    throw $e;
                }
            // } while ($pageToken);

            return $messages;

        } catch (\Exception $e) {
            print 'An error occurred after getting messages from your GMail: ' . $e->getMessage();
            print '<br>';
            throw $e;
        }
       

    }

    /**
     * Get Message with given ID.
     *
     * @param  Google_Service_Gmail $service Authorized Gmail API instance.
     * @param  string $userId User's email address. The special value 'me'
     * can be used to indicate the authenticated user.
     * @param  string $messageId ID of Message to get.
     * @return Google_Service_Gmail_Message Message retrieved.
     */
    function getMessage($service, $userId, $messageId) {
        try {
            $message = $service->users_messages->get($userId, $messageId,['format' => 'full']);
            $data = $message->getPayload();
            //  var_dump($data->getHeaders());//'Message with ID: ' . $message->getId() . ' retrieved.';
            return $message;
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
            return $e;
        }
    }

    /**
     * [messagesGetRequest description]
     * @param  [type] $service   [description]
     * @param  [type] $userId    [description]
     * @param  [type] $messageId [description]
     * @return [type]            [description]
     */
    public function messagesGetRequest($service,$userId,$messageId)
    {

        try {

            if($userId)
            {
                $data  = $service->users_messages->get($userId, $messageId);
                $payLoad = $data->getPayload();
                $headers = $payLoad->getHeaders();
                $parts = $payLoad->getParts();
                $mimeType = $payLoad->getMimeType();
                $body = $payLoad->getBody()->getSize() ? $payLoad->getBody()->getData(): null;
                $parsedEmail = [
                    'mail_id' =>  $data->id, 'history_id' => $data->historyId, 'thread_id' => $data->threadId
                ];
                // $part = $data->payload['modelData']['headers'][0]['value'];

              //  echo $part;
              //  var_dump($data->payload['modelData']);
                // echo "<BR>";
                foreach ($headers as $header)
                {
                 //   echo $header['name'].'----------'.$header['value'].'<BR>';
                  //  var_dump($payLoad);
                    $parsedEmail['header'] = $header;
                    switch ($header['name'])
                    {
                        case 'To':
                            $parsedEmail['received_to'] = $header['value'];
                            break;
                        case 'From':
                            $parsedEmail['received_from'] = $header['value'];
                            break;
                        case 'Subject':
                            $parsedEmail['subject'] = $header['value'];
                            break;
                        case 'Date':
                            $parsedEmail['date'] = $header['value'];
                            break;
                        default:
                            break;
                    }
                }

                $parsedEmail['content_body_plain'] = $body && $mimeType === 'text/plain'
                   ? $body : base64_decode( strtr( $this->getBodyContentByGmail($parts, true), '-_', '+/=') );
                // $parsedEmail['content_body_html'] = $body && $mimeType === 'text/html'
                //    ? $body : base64_decode( strtr( $this->getBodyContentByGmail($parts, false), '-_', '+/=') );
                // $body_data = strtr($parts[0]["modelData"]["body"]["data"], '-_', '+/=');
                // $parsedEmail['mail_body'] = base64_decode($body_data);
                return $parsedEmail;

            } else {
                throw new \Exception("Cant find your user-RefreshIfExpireId", 1);
            }
            
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
        
    }
    //extract body content from gmail messages /**


    /**
     * [getBodyContentByGmail description]
     * @param  [type]  $parts    [description]
     * @param  boolean $getPlain [description]
     * @return [type]            [description]
     */
// @param null $parts
// @return mixed
    public function getBodyContentByGmail($parts = null, $getPlain = false)
    {

        try {

            if($parts)
            {
                foreach($parts as $part)
                {
                    if($part->getBody()->getSize())
                    {
                        if($part->getMimeType() === 'text/plain' && $getPlain)
                        {
                            return $part->getBody()->getData();
                        }
                        if($part->getMimeType() === 'text/html')
                        {
                            return $part->getBody()->getData();
                        }
                    }
                    $innerParts = $part->getParts();
                    foreach($innerParts as $innerPart)
                    {
                        if($innerPart->getMimeType() === 'text/plain' && $getPlain)
                        {
                            return $innerPart->getBody()->getData();
                        }
                        if($innerPart->getMimeType() === 'text/html')
                        {
                            return $innerPart->getBody()->getData();
                        }
                    }
                }
            }
            
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
        
    }


    /**
     * [parseUserParams description]
     * @param  string $params [description]
     * @return [type]         [description]
     */
    public function parseUserParams($params_body = '')
    {
        /*
        {#544 ▼
          +"From": "send_from_addr@gmail.com"
          +"Subject": "Mail subject"
          +"Parameters": "custom_id:%cid% internal_code:%incode% client_email:%clemail%"
          +"Body": "Response body with %params% here"
        }
         */
        // $params_body = 'custom_id:%cusid% internal_code:%incode% red_cfg:%red_var% client_email:%clemail%';

        try {

            $p = '/\S+:\S+/';
            preg_match_all($p, $params_body, $matches);

            foreach ($matches[0] as $val) {
                $arr = explode(':', $val);
                // $vars[$arr[0]] = trim($arr[1], " \t\n\r\0\x0B%.");
                $vars[$arr[0]] = $arr[1];
            }

            if (!isset($vars['email'])) {
                print 'Please define the "email" variable and set it value';
                print '<br>';
                throw new \Exception("\"email\" variable not defined", 1);
                
                return false;
            }

            return $vars;
            
        } catch (\Exception $e) {

            print 'An error occurred while parsing user params: ' . $e->getMessage();
            print '<br>';
            throw $e;

        }

        

    }


    /**
     * [parseMail description]
     * @param  [type] $mailBody [description]
     * @return [type]           [description]
     */
    public function parseMail($mail_body = 'client_email:hello@gmail.com')
    {

        try {
            
            // $mail_body = 'This is a mail wroten by client_email:hello@gmail.com. My client is client_name:Bob. 
            // This is a mail wroten by internal_code:h437h3j4i. My client is custom_id:custId-2371810. And red_cfg:red1.red05.red12.';
            $p = '/\S+:\S+/';
            preg_match_all($p, $mail_body, $matches);

            $vars = [];
            foreach ($matches[0] as $key => $val) {
                $vars[] = explode(':', trim($val, ".% \t\n\r\0\x0B"));
                // $vars[] = explode(':', $val);
            }

            $result = [];
            foreach ($vars as $key => $val) {
                $result[$val[0]] = $val[1];
            }
            // print_r('<br>');
            // print_r($vars);

            return $result; 
            
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }


    /**
     * [parsed_arr_merge description]
     * @param  [type] $mail_vars   [description]
     * @param  [type] $user_vars [description]
     * @return [type]              [description]
     */
    public function parsedArrMerge($mail_vars, $user_vars)
    {

        try {
            
            $result = [];
            foreach ($mail_vars as $mail_key => $mail_val) {
                
                foreach ($user_vars as $par_key => $par_val) {

                    if ($par_key == $mail_key) {

                        $result[$par_val] = $mail_val;

                    }

                }

            }

            return $result;
            
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }



    /**
     * Send Message.
     *
     * @param  Google_Service_Gmail $service Authorized Gmail API instance.
     * @param  string $userId User's email address. The special value 'me'
     * can be used to indicate the authenticated user.
     * @param  Google_Service_Gmail_Message $message Message to send.
     * @return Google_Service_Gmail_Message sent Message.
     */
    function sendMessage($service, $data, $client) {

        try {

            //create MIME message using SwiftMailer
            $msg = \Swift_Message::newInstance()
                ->setTo(array($data['To']))
                ->setSubject($data['Subject'])
                ->setBody($data['Body']);

            //base64URL encode message
            $msg = rtrim(strtr(base64_encode( $msg ), '+/', '-_'), '=');

            $message = new \Google_Service_Gmail_Message();
            $message->setRaw($msg);

            $message = $service->users_messages->send('me', $message);
            print '<span style="font-size: 16px; font-weight: 400; padding-top: 8px;" class="label label-info"> Message with ID: ' . $message->getId() . ' sent </span>';
            print '<br>';
            print '<br>';
            return $message;

        } catch (\Exception $e) {
            print '<span style="ont-size: 16px; font-weight: 400; padding-top: 8px;" class="label label-default"> xx One message was not sent: ' . $e->getMessage() . ' </span>';
            print '<br>';
            print '<br>';
            return $e;
        }

    }




}