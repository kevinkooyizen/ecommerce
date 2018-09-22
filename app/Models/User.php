<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;
use Hash;

class User extends Authenticatable
{
  use Notifiable;

  protected $casts = [
      'admin' => 'bool',
  ];

  protected $fillable = [
      'name', 
      'email', 
      'password',
      'admin',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  public static function createAdmin($request) {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
      'name' => $request['name'],
      'email' => $request['email'],
      'admin' => true,
      'password' => Hash::make($request['password']),
    ]);

  }

  public static function resetPassword($request) {
    $request->validate([
      'password' => 'required|string|min:6|confirmed',
    ]);

    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();
  }
}
