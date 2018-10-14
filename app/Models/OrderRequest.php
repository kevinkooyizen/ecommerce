<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class OrderRequest extends Model {

  protected $guarded = ['id'];

  public function item() {
    return $this->hasOne(Item::class);
  }

  public static function getCurrentUserOrderRequests($request) {
    $items = Item::query();
    $items->join('order_requests', 'order_requests.id', 'items.order_request_id')->where('order_requests.user_id', Auth::user()->id);

    $items = Item::searchItem($request, $items);

    return $items;
  }

  public static function storeOrderRequest($request) {
    $orderRequest = new OrderRequest();
    $orderRequest->user_id = Auth::user()->id;
    $orderRequest->status_id = Status::getStatus('New')->id;
    $orderRequest->country_id = $request->country_id;
    $orderRequest->area = $request->area;
    $orderRequest->quantity = $request->quantity;
    $orderRequest->expected_date = $request->expected_date;
    $orderRequest->url = $request->url;
    $orderRequest->save();

    return $orderRequest;
  }

}
