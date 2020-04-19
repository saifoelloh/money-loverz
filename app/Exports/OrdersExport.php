<?php

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersExport implements FromView
{
  protected $orders;

  /**
   * @param object $orders
   */
  public function __construct(object $orders) {
    $this->orders = $orders;
  }


  public function view() : View {
    return view('pages.export.excel.orders', [
      'orders' => $this->orders,
    ]);
  }
}
