<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;

use Illuminate\Http\Request;

class CartItemsController extends Controller {

  public function store(Request $request) {
    $item = CartItem::addItemToCart($request->itemId);

    $cart = Cart::getCurrentUsersCart();
    $cart->addedItem = $item;
    $cart->addedItemProperties = $item->item;

    return response()->json($cart);
  }

  public function destroy($itemId) {
    CartItem::removeFromCart($itemId);

    $cart = Cart::getCurrentUsersCart();
    $cart->deletedItemId = $itemId;

    return response()->json($cart);
  }

}
