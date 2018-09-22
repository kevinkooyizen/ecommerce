<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
      $this->middleware('guest')->except('logout');
  }

  // public function authenticate(Request $request){
  //   // validate the info, create rules for the inputs
  //   $request->validate([
  //     'email' => 'required|email',
  //     'password' => 'required',
  //   ]);
  //   // if the validator fails, redirect back to the form

  //   // attempt to do the login
  //   $userdata = [
  //     'email'     => $request->email,
  //     'password'  => $request->password,
  //   ];

  //   $user = User::where('email', $request->email)->first();
  //   if($user) {
  //     if (Auth::attempt($userdata)) {
  //       return redirect('admins');
  //     } else {        
  //       $errors = ['password' => 'Invalid password.'];
  //     }
  //   } else {
  //     $errors = ['email' => 'This email is not registered in our system.'];
  //   }
  //   return redirect()->back()
  //     ->withInput($request->only($this->username(), 'remember'))
  //     ->withErrors($errors);
  // }
}
