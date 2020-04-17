<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class ChatController extends Controller
{

  public function index()
  {
    return view('pages.coba.index');
  }
  
  /**
   * send Whatsapp Message w/ twillio
   *
   * @return bool
   */
  public function store(Request $request)
  {
    $message = $request->message;
    $to = "whatsapp:+62".$request->phone;
    $from =  "whatsapp:+14155238886";
    $twilio = new Client(env('TWILIO_AUTH_SID'), env('TWILIO_AUTH_TOKEN'));

    try {
      $message = $twilio->messages->create($to, [
        "from" => $from,
        "body" => $message
      ]);

      if ($message) {
        return redirect(route('send-message.index'));
      }
    } catch (Exception $e) {
      dd($e);
    }
  }
  
}
