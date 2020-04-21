<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $menus = Menu::latest()->get();
    if ($request->ajax()) {
      return Datatables::of($menus)
          ->addIndexColumn()
          ->make(true);
    }

    return view('pages.menu.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $menu = new Menu();

    return view('pages.menu.create', [
      'types' => $menu->daftar['type'],
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
    $account = auth()->user();
    $photo = $request->file('photo')->store('public');
    $url = Storage::url($photo);
    try {
      $temp = $account->menus()->create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => intval($request->price),
        'photo' => $url,
        'type' => $request->type
      ]);
      if ($temp) {
        return redirect('menu')->with('status', 'Berhasil membuat menu baru');
      } else {
        return redirect('menu')->with('status', 'Maaf anda gagal membuat menu baru');
      }
    } catch (\Throwable $th) {
      return abort(400, $th);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $menu = Menu::find($id);
    return view('pages.menu.show', [
      'menu' => $menu,
      'options' => $menu->optionalMenus
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $menu = Menu::find($id);

    return view('pages.menu.edit', [
      'menu' => $menu,
      'types' => $menu->daftar['type']
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $menu = Menu::find($id);
    $photo = '';
    if ($request->photo == null) {
      $photo = $menu->photo;
    } else {
      $temp = $request->photo()->store('public');
      $photo = Storage::url($temp);
    }

    try {
      $menu->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => intval($request->price),
        'photo' => $photo,
        'type' => $request->type
      ]);
    } catch (\Throwable $th) {
      return abort(400, $th);
    } finally {
      return redirect(route('menu.index'));
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $result = Menu::destroy($id);
      if ($result) {
        return redirect('menu.index');
      }
    } catch (\Throwable $th) {
      return abort(400, $th);
    }
  }
}
