<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller {
  public function show(Request $request) {
    if (Auth::user()) {
      return response()->json(Auth::user());
    } elseif (!Auth::user()) {
      return response()->json(false);
    }
  }
}
