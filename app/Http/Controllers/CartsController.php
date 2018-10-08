<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Item;

use DB;
use Input;
use Route;

use Illuminate\Http\Request;

class CartsController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request) {
    $item = Item::searchItem($request);

    $request->minPrice = $items->min('price');
    $request->maxPrice = $items->max('price');

    return view('shop', compact('items', 'request'));
  }

  public function show($cartId) {
    $cart = Cart::find($cartId);
    $cartItems = $cart->items;
    return view('carts.show', compact('cart', 'cartItems'));
  }
}
