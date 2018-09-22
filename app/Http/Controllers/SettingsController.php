<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class SettingsController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function resetPassword(Request $request) {
    User::resetPassword($request);

    return redirect('reset-password')->with('success', 'Password Changed');
  }
}
