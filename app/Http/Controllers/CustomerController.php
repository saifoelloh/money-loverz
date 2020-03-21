<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('pages.customer.index', [
            'customers' => $customers
        ]);
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
            Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'email' => $request->email,
                'address' => $request->address
            ]);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('customer.index'));
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
        $customer = Customer::find($id);
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
        $customer = Customer::find($id);
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
        $customer = Customer::find($id);
        try {
            $customer->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'email' => $request->email,
                'address' => $request->address
            ]);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('customer.index'));
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
            Customer::destroy($id);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('customer.index'));
        }
    }
}
