<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use Illuminate\Http\Request;

use Braintree_Transaction;

class PaymentsController extends Controller {

  public function create(Request $request) {
    $cart = Cart::find($request->cartId);
    return view('payments.create', compact('cart'));
  }

  public function process(Request $request) {
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];
    $cart = Cart::find($payload['cartId']);

    $status = Braintree_Transaction::sale([
      'amount' => $cart->total,
      'paymentMethodNonce' => $nonce,
      'options' => ['submitForSettlement' => True]
    ]);

    if ($status->success) {
      $cart->paid = true;
      $cart->save();
    }

    $status->cartId = $cart->id;

    return response()->json($status);
  }

}
