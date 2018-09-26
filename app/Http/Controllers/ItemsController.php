<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request) {
    $items = Item::all();
    
    return view('shop', compact('items'));
  }

  public function store(Request $request) {
    User::createAdmin($request);

    return redirect('admins')->with('success', 'User created');
  }
}
