<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\OrderRequest;

use Illuminate\Http\Request;

use Auth;

class OrderRequestsController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request) {
    $items = OrderRequest::getCurrentUserOrderRequests($request);

    return view('orders.index', compact('items', 'request'));
  }

  public function show(Request $request, $orderId) {
    $order = OrderRequest::find($orderId);

    return redirect("items/{$order->item->id}");
  }

}
