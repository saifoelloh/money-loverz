<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use App\MenuOrder;
use Illuminate\Http\Request;

class MenuOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($code)
    {
        $menus = Menu::latest()->get();

        return view('pages.detail-order.edit', [
          'menus' => $menus,
          'code' => $code
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $code)
    {
        $order = Order::with(['menus', 'package:id,total_items'])->where('code', $code)->first();
        $menu = Menu::find($request->menu);
        if ($order->menus()->count() < $order->package->total_items) {
          try {
            $detailOrder = $order->menus()->attach($menu->id, [
              'antar' => $request->antar,
              'note' => $request->note
            ]);

            return redirect(route('order.show', $order->id))->with([
              'status' => 'Makanan berhasil ditambahkan kedalam keranjang',
              'success' => true
            ]);
          } catch (Exception $e) {
            return abort(400, $e);
          }
        } else {
          return redirect(route('order.show', $order->id))->with([
              'status' => 'Pesanan sudah mencapai batas maksimal',
              'success' => false
          ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuOrder  $menuOrder
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $menus = Menu::latest()->get();
        $order = Order::with('package:id,total_items')->where('code', $code)->first();

        return view('pages.detail-order.create', [
          'menus' => $menus,
          'code' => $code,
          'order' => $order->id,
          'package' => $order->package
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuOrder  $menuOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuOrder $menuOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuOrder  $menuOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuOrder $menuOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuOrder  $menuOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($code, $menu)
    {
        $order = Order::with('menus')->where('code', $code)->first();
        try {
          $result = $order->menus()->detach($menu);
          if ($result) {
            return redirect(route('order.show', $order->id))->with([
                'status' => 'Pesananmu berhasil dihapus',
                'success' => true
            ]);
          } else {
            return redirect(route('order.show', $order->id))->with([
                'status' => 'Gagal menghapus pesanan',
                'success' => false
            ]);
          }
        } catch (Exception $e) {
          return redirect(route('order.show', $order->id))->with([
              'status' => 'Gagal menghapus pesanan',
              'success' => false
          ]);
        }
    }
}
