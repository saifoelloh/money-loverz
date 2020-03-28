<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('role', 'user')->latest()->get();
        if ($request->ajax()) {
          return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
        }

        return view('pages.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $customer = User::create($request->all());
            if ($customer) {
                return redirect(route('customer.index'));
            }
        } catch (\Throwable $th) {
            return abort(400, $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::find($id);
        return view('pages.customer.show', [
            'customer' => $customer,
            'orders' => $customer->orders()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        return view('pages.customer.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = User::find($id);
        try {
          $result = $customer->update($request->all());
          if ($result) {
            return redirect('customer')->with('status', 'Sukses memperbarui data pelanggan');
          } else {
            return redirect('customer')->with('status', 'Gagal memperbarui data pelanggan');
          }
        } catch (\Throwable $th) {
            return abort(400, $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
          $result = User::destroy($id);
          if ($result) {
            return redirect('customer')->with('status', 'Sukses menghapus data pelanggan');
          } else {
            return redirect('customer')->with('status', 'Gagal menghapus data pelanggan');
          }
        } catch (\Throwable $th) {
            return abort(400, $th);
        }
    }
}
