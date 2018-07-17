<?php

namespace App\Repositories;

use App\Contracts\Repositories\FacebookRepository as FacebookRepositoryContract;
use Facebook;
use Auth;
use Session;

/**
 * @todo getFeedBodyAsArray() - must to get all statuses in do-while
 */

class FacebookRepository extends Facebook implements FacebookRepositoryContract
{


    public function tryOrDie($value='')
    {
        try {
            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get('/me', self::$access_token);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            print '<br>';
            // exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            print '<br>';
            // exit;
        } catch(\Exception $e) {
            echo 'Exc: ' . $e->getMessage();
        } 
    }


    /**
     * @return mixed
     */
    public function getUser($access_token)
    {
        try {
            
            $data = Facebook::get('/me?fields=id,name,cover,email,gender,first_name,last_name,locale,timezone,link,picture', $access_token);
            return json_decode($data->getGraphUser(),true);
            
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }

    }


    /**
     * JPEG, BMP, PNG, GIF, TIFF
     * 
     * @param  [type] $data         [description]
     * @param  [type] $access_token [description]
     * @param  [type] $image        [description]
     * @return [type]               [description]
     */
    public function postImage($image, $access_token)
    {
        $data = [
          'message' => 'My awesome photo upload example.',
          'source' => Facebook::fileToUpload( asset('img/github.png') ),
        ];

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = Facebook::post('/me/photos', $data, $access_token);
            echo 'Photo ID: ' . $graphNode['id'];
            return $response;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            // exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            // exit;
        }

        $graphNode = $response->getGraphNode();


    }


    public function postCrossImage($status, $images, $access_token)
    {
        try {
            $data = [
                'name' => "aimee_".$this->generateRandomString(),
            ];
            $responses = Facebook::post('/me/albums', $data, $access_token);
            $id = $responses->getDecodedBody();

            foreach ($images as $photo) {
                $response = Facebook::post("/" . $id['id'] . "/photos", array(
                    'message' => $status,
                    'url' => $photo,
                ), $access_token
                );
            }
            return $id;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $graphNode = $id->getGraphNode();
        echo 'Albums ID: ' . $graphNode['id'];
    }


    public function post_single_Image($status,$image, $access_token)
    {
        $data = [
            'message' => $status,
            'source' => Facebook::fileToUpload( asset($image) ),
        ];
        $response = "";
        try {
            // Returns a Facebook\FacebookResponse object
            $response = Facebook::post('/me/photos', $data, $access_token);
            return $response;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            // exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            // exit;
        }
        if (@$response->getGraphNode) {
            $graphNode = $response->getGraphNode();
            echo 'Albums ID: ' . $graphNode['id'];
        }

    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    public function getMe($access_token)
    {
        try {
            
            $data = Facebook::get('/me', $access_token);
            return $data;
            return json_decode($data->getGraphUser(),true);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            print '<br>';
            // exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            print '<br>';
            // exit;
        }
    }

    /**
     * @return mixed
     */
    public function getFeed($access_token)
    {
        try {
            
            $data = Facebook::get('/me/feed', $access_token);
            return $data->getGraphEdge();
            
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }

    public function getFeedBodyAsArray($access_token)
    {
        // $n = 0;
        // do {
            
            try {

                $data = Facebook::get('/me/feed?fields=id,message,story,link&limit=100', $access_token);
                // $data = Facebook::get('/me/feed?fields=id,message,story,link&limit=5&offset=' . $n, $access_token);
                // $data = Facebook::get('/me/feed', $access_token);
                // $data = Facebook::get('/me/feed?fields=id,message,link,place,attachments&limit=25', $access_token);
                return $data->getDecodedBody();

            } catch (FacebookRequestException $e) {
                print_r( "The Graph API returned an error: " . $e->getMessage() );
            } catch (\Exception $e) {
                print_r( "An error occured: " . $e->getMessage() );
            }

            // $n += 5;

        // } while ($data);

    }

    /**
     * @return mixed
     */
    public function post($access_token, $messages)
    {
        try {
            
            foreach ($messages as $message)
                Facebook::post($messages, $access_token);
            
        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }

    public function postMessage($data, $access_token)
    {
        try {
            
            // Returns a `Facebook\FacebookResponse` object
            $response = Facebook::post('/me/feed', $data, $access_token);
            $graphNode = $response->getGraphNode();
            echo 'Posted with id: ' . $graphNode['id'] . '<br>';
            return $response;

        } catch (\Exception $e) {
            print 'An error occurred: ' . $e->getMessage();
            print '<br>';
        }
    }


    public function postRss($data, $access_token)
    {
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = Facebook::post('/me/feed', $data, $access_token);
            $graphNode = $response->getGraphNode();
            echo '<span class="text-success">Successfully posted</span> with id: ' . $graphNode['id'] . '<br>';
            return $response;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            print '<br>';
            return $e;
            // return -1;
            // exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            print '<br>';
            return $e;
            // exit;
            // return -1;
        }


    }

    public function syncPost($data, $access_token)
    {
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = Facebook::post('/me/feed', $data, $access_token);
            $graphNode = $response->getGraphNode();
            echo '<span class="text-success">Successfully posted</span> with id:' . $graphNode['id'] . '<br>';
            return $response;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            print '<br>';
            // return -1;
            // exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            print '<br>';
            // exit;
            // return -1;
        }
    }


    public function rePost($data, $access_token)
    {
        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = Facebook::post('/me/feed', $data, $access_token);
            $graphNode = $response->getGraphNode();
            echo 'Posted with id: ' . $graphNode['id'] . '<br>';
            return $response;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            print '<br>';
            return -1;
            // exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            print '<br>';
            // exit;
            return -1;
        }
    }
}
