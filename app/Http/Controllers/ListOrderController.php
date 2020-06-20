<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Menu;
use App\MenuOrder;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    public function find(Request $request)
    {
      $customer = User::where('phone', $request->phone)->first();
      return view('listorder', [
        'customer' => $customer,
        'orders' => $customer->orders,
        'count' => sizeof($customer->orders)
      ]);
    }


}
