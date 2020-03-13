<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $menus = Menu::all();
    return view('pages.menu.index', [
      'menus' => $menus
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.menu.create');
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
    $temp = $account->menus()->create([
      'name' => $request->name,
      'description' => $request->description,
      'price' => intval($request->price),
      'photo' => $url,
    ]);
    dd($temp);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function show(Menu $menu)
  {
    //
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
      'menu' => $menu
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Menu $menu)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function destroy(Menu $menu)
  {
    //
  }
}
