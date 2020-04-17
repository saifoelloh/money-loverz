<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class ChatController extends Controller
{
  /**
   * send Whatsapp Message w/ twillio
   *
   * @return bool
   */
  public function sendMessage($number)
  {
    $to = "whatsapp:+62".$number;
    $from =  "whatsapp:+14155238886";
    $twilio = new Client(env('TWILIO_AUTH_SID'), env('TWILIO_AUTH_TOKEN'));

    try {
      $message = $twilio->messages->create($to, [
        "from" => $from,
        "body" => "Hello"
      ]);

      return $message->sid;
    } catch (Exception $e) {
      dd($e);
    }
  }
  
}
