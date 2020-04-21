<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $packages = Package::latest()->get();
        if ($request->ajax()) {
          return Datatables::of($packages)
              ->addIndexColumn()
              ->make(true);
        }
        return view('pages.package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $package = new Package();
      return view('pages.package.create', [
        'types' => $package->daftar['type']
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
        $photo = $request->file('photo')->store('public');
        $url = Storage::url($photo);

        try {
            Package::create([
                'name' => $request->name,
                'photo' => $url,
                'price' => intval($request->price),
                'type' => $request->type,
                'total_items' => intval($request->total_items),
                'description' => $request->description,
            ]);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('package.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        return view('pages.package.edit', [
          'package' => $package,
          'types' => $package->daftar['type']
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);

        if ($request->file('photo')) {
            $photo = $request->file('photo')->store('public');
            $url = Storage::url($photo);
        } else {
            $url = $package->photo;
        }

        try {
            $package->update([
                'name' => $request->name,
                'photo' => $url,
                'price' => intval($request->price),
                'type' => $request->type,
                'total_items' => intval($request->total_items),
                'description' => $request->description,
            ]);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('package.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Package::destroy($id);
        } catch (\Throwable $th) {
            return abort(400, $th);
        } finally {
            return redirect(route('package.index'));
        }
    }
}
