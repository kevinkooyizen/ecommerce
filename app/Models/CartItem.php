<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class CartItem extends Model {

  public function item() {
    return $this->belongsTo(Item::class);
  }

  public static function addItemToCart($itemId) {
    $cart = Cart::getCurrentUsersCart();

    $item = Item::find($itemId);

    $cartItem = new CartItem;
    $cartItem->cart_id = $cart->id;
    $cartItem->item_id = $itemId;
    $cartItem->subtotal = $item->price;
    $cartItem->total = $item->price;
    $cartItem->save();

    Cart::calculateTotals($cart);

    return $cartItem;
  }

  public static function removeFromCart($itemId) {
    $cart = Cart::getCurrentUsersCart();

    $cartItem = CartItem::destroy($itemId);

    Cart::calculateTotals($cart);
  }

}
