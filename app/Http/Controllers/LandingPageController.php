<?php

namespace App\Http\Controllers;


use App\Order;
use App\Package;
use Illuminate\Http\Request;

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
}
