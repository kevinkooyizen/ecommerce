<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class OrderRequest extends Model {

  public function item() {
    return $this->hasOne(Item::class);
  }

  public function status() {
    return $this->belongsTo(Status::class);
  }

  public static function getCurrentUserOrderRequests($request) {
    $items = Item::query();
    $items->join('order_requests', 'order_requests.id', 'items.order_request_id')->where('order_requests.user_id', Auth::user()->id);

    $items = Item::searchItem($request, $items);

    return $items;
  }

}
