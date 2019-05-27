<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;

use Illuminate\Http\Request;

class CartItemsController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function store(Request $request) {
    $item = CartItem::addItemToCart($request->itemId);

    $cart = Cart::getCurrentUsersCart();
    $cart->addedItem = $item;
    $cart->addedItemProperties = $item->item;
    $cart->items = $cart->items;

    return response()->json($cart);
  }

  public function destroy(Request $request, $itemId) {
    $cart = Cart::getCurrentUsersCart();
    CartItem::removeFromCart($itemId);

    $cart->deletedItemId = $itemId;
    $cart->items = $cart->items;

    if ($request->ajax()) {
      return response()->json($cart);
    } elseif (!$request->ajax()) {
      return redirect("/carts/$cart->id");
    }
  }

}
