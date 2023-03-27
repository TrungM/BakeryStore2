<?php

namespace App\Services;

use Vonage\Client;
use Vonage\Client\Credentials\Basic;

class VonageMessage
{
    public static function sendSMS($to, $text) {
        $basic  = new Basic("edd60f4d", '0KyKzSZLsNS0DrP0');
        $client = new Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($to, "Minh Trung", $text)
        );
         $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";

            // return $response;
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }


    }
}
