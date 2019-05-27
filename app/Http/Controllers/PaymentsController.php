<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Status;

use Illuminate\Http\Request;

use Braintree_Transaction;

class PaymentsController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function create(Request $request) {
    $orderIds = explode(",", $request->selectedOrders);
    $totalPrice = 0;
    foreach ($orderIds as $orderId) {
      $order = Order::find($orderId);
      $totalPrice += $order->item->price;
    }
    return view('payments.create', compact('totalPrice', 'orderIds'));
  }

  public function process(Request $request) {
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];
    $orderIds = explode("|", $payload['orderIds']);
    $totalPrice = 0;
    foreach ($orderIds as $orderId) {
      $order = Order::find($orderId);
      $order->status_id = Status::getStatus('Paid')->id;
      $order->save();
      $totalPrice += $order->item->price;
    }

    $status = Braintree_Transaction::sale([
      'amount' => $totalPrice,
      'paymentMethodNonce' => $nonce,
      'options' => ['submitForSettlement' => True]
    ]);

    return response()->json($status);
  }

}
