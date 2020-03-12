<?php

namespace App\Http\Controllers;

use App\OptionalMenu;
use Illuminate\Http\Request;

class OptionalMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = OptionalMenu::all();
      
      return view('pages.optional-menu', [
        'items' => $items
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = OptionalMenu::select('category')->get();
      return view('pages.optional-menu.create', [
        'categories' => $categories
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
      try {
        OptionalMenu::create([
          'name' => $request->name,
          'category' => $request->category,
          'price' => $request->price,
        ]);
      } catch (Exception $e) {
        return abort(400, $e);
      } finally {
        return redirect()->route('optional-menu');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OptionalMenu  $optionalMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $optionalMenu = OptionalMenu::find($id);
      return view('optional_menus.edit', [
        'optionalMenu' => $optionalMenu
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OptionalMenu  $optionalMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $optionalMenu = OptionalMenu::find($id);
      if (!$optionalMenu) {
        return abort(404);
      } else {
        try {
          OptionalMenu::update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
          ]);
        } catch (Exception $e) {
          return abort(400, $e);
        } finally {
          return redirect()->route('optional-menu');
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OptionalMenu  $optionalMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = OptionalMenu::find($id);
      if (!$item) {
        return abort(404);
      }

      try {
        $item->delete();
      } catch (Exception $e) {
        return abort(400, $e);
      } finally {
        return redirect()->route('optional_menu');
      }
    }
}
