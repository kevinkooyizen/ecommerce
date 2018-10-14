<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Status;

use Illuminate\Http\Request;

use Auth;

class OrdersController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function show(Request $request, $salesOrPurchases) {
    if ($salesOrPurchases == "purchase-requests") {
      $orders = Order::where('user_id', Auth::user()->id)->get();
    } elseif ($salesOrPurchases == "sale-requests") {
      $orders = Order::join('items', 'item_id', 'items.id')
        ->where('items.user_id', Auth::user()->id)
        ->where('orders.status_id', '!=', Status::getStatus('Cancelled')->id)
        ->get();
    }
    return view('orders.show', compact('orders', 'salesOrPurchases'));
  }

  public function store(Request $request) {
    if (!$request->selectedItem) {
      return redirect()->back()->withError('No items selected. Please select at least one item to request.');
    }
    foreach ($request->selectedItem as $cartItemId) {
      if (CartItem::find($cartItemId)) {
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->item_id = CartItem::find($cartItemId)->item->id;
        $order->status_id = Status::getStatus('Pending')->id;
        $order->save();
      }

      CartItem::destroy($cartItemId);
    }

    return redirect('orders/purchase-requests');
  }

  public function update(Request $request, $orderId) {
    $order = Order::find($orderId);
    $order->status_id = $request->status_id;
    $order->save();

    return redirect("orders/$request->salesOrPurchases");
  }

  public function destroy(Request $request, $orderId) {
    Order::destroy($orderId);

    return redirect('orders/purchase-requests');
  }

}
