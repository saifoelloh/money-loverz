<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Package;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LandingPageController extends Controller
{
    public function index(Request $request) {
        $packages = Package::all(['id', 'name']);
        $order = new Order();
        $menus = Menu::all()->groupBy('type');
        return view('welcome', [
          'packages' => $packages,
          'order' => $order,
          'menus' => $menus
        ]);
    }

    public function dashboard() {
      $today = date("Y-m-d");
      $orderHarian = Order::whereDate('created_at', $today)->get()->count();
      $orderBulanan = Order::whereMonth('created_at', date("m"))->get()->count();
      $orderTerkonfirmasi = Order::with(['menus', 'package:id,name', 'customer:id,name'])->where('status', 'confirmed')->simplePaginate(15);
      $jumlahOrderTerkonfirmasi = Order::where('status', 'confirmed')->get()->count();
      $orderSelesai = Order::where('status', 'completed')->get()->count();

      return view('dashboard', [
        'orderHarian' => $orderHarian,
        'orderBulanan' => $orderBulanan,
        'orderTerkonfirmasi' => $orderTerkonfirmasi,
        'jumlahOrderTerkonfirmasi' => $jumlahOrderTerkonfirmasi,
        'orderSelesai' => $orderSelesai,
        'month' => date("F")
      ]);
    }
}
