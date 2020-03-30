<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/foo', function(Request $request) {
  $user = App\User::create($request->merge([
    'password' => Hash::make($request->password)
  ])->all());
  return $user;
});

Route::post('/make-order/{code}', 'MenuOrderController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

