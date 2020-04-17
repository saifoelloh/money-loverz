<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LandingPageController extends Controller
{
    public function index(Request $request) {
        $packages = Package::all(['id', 'name']);
        $order = new Order();
        return view('welcome', [
          'packages' => $packages,
          'kecamatan' => $order->daftar['kecamatan'],
        ]);
    }

    public function dashboard() {
      $now = Carbon::today()->format("Y-m-d");
      $orders = Order::where('created_at', '>=', $now)->count();
      $customers = User::where([
        'role' => 'user',
        [
          'created_at',
          '>=',
          $now
        ]
      ])->count();

      return view('dashboard');
    }
}
