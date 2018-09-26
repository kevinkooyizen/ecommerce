<?php

Route::get('/', function () {return view('home');});
Route::get('/shop', function () {return view('shop');});

Route::get('reset-password', function(){return view('auth.passwords.reset');});
Route::post('reset-password', 'SettingsController@resetPassword');
Auth::routes();

Route::resource('admins', 'AdminController');
Route::get('admins', function () {return redirect('/');});
Route::group(['middleware' => 'checkAdmin'],function (){
  Route::resource('test', 'TestController');
});