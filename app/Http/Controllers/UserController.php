<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
      $data = User::whereIn('role', ['admin', 'admin'])->latest()->get();
      if ($request->ajax()) {
        return Datatables::of($data)
          ->addIndexColumn()
          ->make(true);
      }

      return view('pages.user.index');
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
      try {
        $result = User::create($request->merge([
          'password' => Hash::make($request->password)
        ])->all());
        if ($result) {
          return redirect()->route('admin.index')->withStatus(__('Admin berhasil dibuat'));
        }
      } catch (Exception $e) {
          return redirect()->route('admin.index')->withStatus(__('Gagal membuat admin'));
      }
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.user.edit', [
          'user' => $user
        ]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {
      $user = User::find($id);
      $password = $user->password;
      if ($request->password!="") {
        $password = Hash::make($request->password);
      }

      try {
        $result = $user->update($request->merge([
          'password' => $password
        ])->all());

        if ($result) {
          return redirect()->route('admin.index')->withStatus(__('Admin berhasil diupdate'));
        }
      } catch (Exception $e) {
          return redirect()->route('admin.index')->withStatus(__('Edit admin gagal'));
      }
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
