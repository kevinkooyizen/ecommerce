<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function index(Request $request) {
    print_r(Auth::user());exit;
  }

  public function store(Request $request) {
    User::createAdmin($request);

    return redirect('admins')->with('success', 'User created');
  }
}
