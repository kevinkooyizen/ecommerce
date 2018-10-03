<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Status;

use Illuminate\Http\Request;

use Auth;

class OrdersController extends Controller {

  public function show(Request $request, $salesOrPurchases) {
    if ($salesOrPurchases == "purchases") {
      $orders = Order::where('user_id', Auth::user()->id)->get();
    }
    return view('orders.show', compact('orders'));
  }

  public function store(Request $request) {
    $cart = Cart::find($request->cart_id);
    $cartItems = $cart->items;
    foreach ($cartItems as $cartItem) {
      $order = new Order;
      $order->user_id = $request->user_id;
      $order->item_id = $cartItem->item_id;
      $order->status_id = Status::pendingStatus()->id;
      $order->save();

      CartItem::destroy($cartItem->id);
    }

    return redirect('orders/purchases');
  }

  public function update(Request $request, $orderId) {
    $order = Order::find($orderId);
    $order->status_id = $request->status_id;
    $order->save();

    return redirect('orders/purchases');
  }

  public function destroy(Request $request, $orderId) {
    Order::destroy($orderId);

    return redirect('orders/purchases');
  }

}
