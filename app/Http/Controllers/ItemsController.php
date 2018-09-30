<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

use DB;
use Input;
use Route;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
  public function index(Request $request) {
    $items = Item::searchItem($request);

    $request->minPrice = $items->min('price');
    $request->maxPrice = $items->max('price');

    return view('shop', compact('items', 'request'));
  }

  public function store(Request $request) {
    User::createAdmin($request);

    return redirect('admins')->with('success', 'User created');
  }
}
