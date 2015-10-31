<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 10/28/2015
 * Time: 10:45 PM
 */

namespace Db\Utility;
use Httpful\Request;

class MailChimp
{
    private static $ListId  = "d99b6ea994";
    private static $URL = "https://us12.api.mailchimp.com/3.0/";
    private static $APIKeySignup = "9a14ac5c8601b8317214ba29f3439fce-us12";


    public static function subscribe($email){

        $url = MailChimp::$URL . "lists/" . MailChimp::$ListId . "/members";
        $data = array('email_address' => $email, 'status' => 'subscribed',
                "merge_fields"=>array( "FNAME" => "Urist",
                                        "LNAME"=> "McVankab")
        );
        echo json_encode($data);
        $response = Request::put($url)                  // Build a PUT request...
        ->contentType("JSON")                              // tell it we're sending (Content-Type) JSON...
        ->authenticateWith('anystring', MailChimp::$APIKeySignup)  // authenticate with basic auth...
        ->body(json_encode($data))             // attach a body/payload...
        ->send();                                   // and finally, fire that thing off!

        /*
        // use key 'http' even if you send the request to https://...
        $options = array(
            'https' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => array('email_address' => $email, 'status' => 'subscribed'),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        */
        echo $response->body;
        return $response->body;
    }


}