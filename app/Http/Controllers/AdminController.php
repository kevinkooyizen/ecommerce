<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request) {
    $admins = User::where('admin', true)->get();
    
    return view('admin.index', compact('admins'));
  }

  public function store(Request $request) {
    User::createAdmin($request);

    return redirect('admins')->with('success', 'User created');
  }
}
