<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

use Auth;
use DB;
use Input;
use Route;

use Illuminate\Http\Request;

class ItemsController extends Controller {
  public function index(Request $request) {
    $items = Item::searchItem($request);

    $request->minPrice = $items->min('price');
    $request->maxPrice = $items->max('price');

    return view('items.index', compact('items', 'request'));
  }

  public function create(Request $request) {
    $items = new Item;

    return view('items.create', compact('item'));
  }

  public function store(Request $request) {
    $item = Item::storeItem($request);

    return redirect("items/$item->id");
  }

  public function show(Request $request, $variable) {
    if ($variable == "owner-shop") {
      $items = Item::where('user_id', Auth::user()->id)->paginate(9);

      return view('items.owner_shop', compact('items', 'request'));
    } else {
      $items = Item::find($variable);

      return view('items.show', compact('item'));
    }
  }
}
