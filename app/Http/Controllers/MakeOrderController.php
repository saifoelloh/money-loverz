<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Menu;
use App\Package;
use Illuminate\Http\Request;

class MakeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::latest()->get();
        return view('welcome', [
            'packages' => $packages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderCount = Order::whereDate('created_at', '=', date('Y-m-d'))->count();
        $code = "PKG".sprintf('%02d', $request->package).date("dmy").sprintf('%04d', $orderCount + 1);
        $clock = date("H.i", time());
        if ($clock <= 19.30) {
            if ($request->checked) {
              $customer = User::where('phone', $request->phone)->first();
            } else {
              $customer = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'address' => $request->jalan,
                'phone' => $request->phone,
              ]);
            }
          try {
            $order = Order::create([
              'code' => $code,
              'payment_method' => $request->payment_method,
              'kecamatan' => $request->kecamatan,
              'kelurahan' => $request->kelurahan,
              'jalan' => $request->jalan,
              'address_notes' => $request->address_notes,
              'package_id' => $request->package,
              'customer_id' => $customer->id,
            ]);
            if ($order) {
              return redirect(route('order.index'));
            }
          } catch (\Throwable $th) {
            return abort(400, $th);
          }
        } else {
          return redirect('order')->with('status', "Sorry we're out today...");
        }
        try {
        } catch (Exception $e) {
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
