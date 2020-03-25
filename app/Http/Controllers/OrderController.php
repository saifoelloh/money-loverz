<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Package;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['user:id,name', 'customer:id,name', 'package'])->get();
        return view('pages.order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $packages = Package::all();
        return view('pages.order.create', [
            'customers' => $customers,
            'packages' => $packages,
            'error' => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = auth()->user();
        $customer = Customer::find($request->customer);
        $orderCount = Order::whereDate('created_at', '=', date('Y-m-d'))->count();
        $code = "PKG".sprintf('%02d', $request->package)."/".date("d/m/y")."/".sprintf('%04d', $orderCount + 1);
        $clock = date("H.i", time());
        if ($clock <= 19.30) {
            try {
                $order = $customer->orders()->create([
                    'code' => $code,
                    'payment_method' => $request->payment_method,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'jalan' => $request->jalan,
                    'address_notes' => $request->address_notes,
                    'package_id' => $request->package,
                    'user_id' => $admin->id
                ]);
                return redirect(route('order.index'));
            } catch (\Throwable $th) {
                return abort(400, $th);
            }
        } else {
          return redirect('order')->with('status', "Sorry we're out today...");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('pages.order.show', [
            'order' => $order,
            'items' => $order->items(),
            'customer' => $order->customer()
        ]);
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
