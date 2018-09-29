<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Cart extends Model {

  public function items() {
    return $this->hasMany(CartItem::class);
  }

  public static function getCurrentUsersCart() {
    $cart = Cart::where('user_id', Auth::user()->id)->where('paid', false)->first();
    if (!$cart) {
      $cart = new Cart;
      $cart->user_id = Auth::user()->id;
      $cart->save();
    }
    return $cart;
  }

  public static function calculateTotals($cart) {
    $cartItems = $cart->items;
    $cart->subtotal = 0;
    $cart->total = 0;

    foreach ($cartItems as $cartItem) {
      $cart->subtotal += $cartItem->subtotal;
      $cart->total += $cartItem->total;
    }
    $cart->save();
    return $cart;
  }

}
