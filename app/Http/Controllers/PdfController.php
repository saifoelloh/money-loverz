<?php

namespace App\Http\Controllers;

use PDF;
use App\Order;
use Illuminate\Http\Request;

class PdfController extends Controller
{
  /**
   * menampilkan invoice dari sebuah pesanan
   *
   * @return pdf
   */
  public function order($code)
  {
    $order = Order::where('code', $code)->first();
    $pdf = PDF::loadView('pages.pdf.order', [
      'order' => $order,
      'title' => 'Hello Guys'
    ]);

    return $pdf->stream();
  }
  
}
