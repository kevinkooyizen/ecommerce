<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

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
    $item = Item::create($request->all());
    $item = storeImage($item, $request);
    $item->save();

    return redirect("items/$item->id");
  }

  public function show($itemId) {
    $items = Item::find($itemId);

    return view('items.show', compact('item'));
  }
}
