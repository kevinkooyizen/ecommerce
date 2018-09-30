<?php

// Static Routes
Route::get('/', function () {return view('home');});

// Payment Routes
Route::resource('payments', 'PaymentsController');

// User Routes
Route::get('users', 'UsersController@show');

// Shopping Routes
Route::get('shop', 'ItemsController@index');
Route::resource('cart-items', 'CartItemsController');
Route::resource('carts', 'CartsController');

// Auth Routes
Route::get('reset-password', function(){return view('auth.passwords.reset');});
Route::post('reset-password', 'SettingsController@resetPassword');
Auth::routes();

// Admin Routes
Route::resource('admins', 'AdminController');

// Super Admin Routes
Route::get('admins', function () {return redirect('/');});
Route::group(['middleware' => 'checkAdmin'],function (){
  Route::resource('test', 'TestController');
});

// Payment Routes
Route::post('/payment/process', 'PaymentsController@process')->name('payment.process');