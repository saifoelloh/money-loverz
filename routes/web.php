<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::group([
  'as' => 'make-order',
  'prefix' => 'make-order'
], function() {
  Route::post('/', 'MakeOrderController@store')->name('.store');
  Route::get('/{code}', 'MakeOrderController@index')->name('.index');
  Route::put('/{code}/{status}', 'MakeOrderController@edit')->name('.purchase');
  Route::post('/{code}', 'MakeOrderController@add')->name('.add');
  Route::delete('/{code}/{menuId}/{antar}', 'MakeOrderController@destroy')->name('.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth', 'check-role']], function () {
	Route::resource('admin', 'UserController');
	Route::resource('menu', 'MenuController');
	Route::resource('faq', 'FaqController');
	Route::resource('package', 'PackageController');
	Route::resource('customer', 'CustomerController');
	Route::resource('order', 'OrderController');
  Route::get('today-order', 'OrderController@today')->name('order.today');
  Route::group([
    'as' => 'detail-order',
    'prefix' => 'detail-order',
  ], function() {
    Route::get('/{code}', 'MenuOrderController@show')->name('.create');
    Route::post('/{code}', 'MenuOrderController@store')->name('.store');
    Route::get('/{code}/edit/{menu}/{antar}', 'MenuOrderController@edit')->name('.edit');
    Route::put('/{code}/edit/{menu}/{antar}', 'MenuOrderController@update')->name('.update');
    Route::delete('/{code}/edit/{menu}/{antar}', 'MenuOrderController@destroy')->name('.destroy');
  });
	Route::resource('optional-menu', 'OptionalMenuController');
	Route::group([
		'as' => 'optional-menu',
		'prefix' => 'optional-menu'
	], function () {
		Route::get('/create/{id}', 'OptionalMenuController@create')->name('.create');
	});
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
  Route::group([
    'as' => 'pdf',
    'prefix' => 'pdf'
  ], function() {
    Route::get('/order/{code}', 'PdfController@order')->name('.order');
  });
});
