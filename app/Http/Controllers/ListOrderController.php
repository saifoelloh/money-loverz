<?php

namespace App\Http\Controllers;

use App\Order;
use App\Package;
use App\User;
use App\Menu;
use App\MenuOrder;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    public function find(Request $request)
    {
      $customer = User::where('phone', $request->phone)->first();

      if ($customer) {
        $packages = Package::all(['id', 'name']);
        $order = new Order();

        return view('listorder', [
          'customer' => $customer,
          'orders' => $customer->orders,
          'count' => sizeof($customer->orders),
          'packages' => $packages,
          'order' => $order,
        ]);
      } else {
        return redirect(route('landing-page'));
      }

    }


}
