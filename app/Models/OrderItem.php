<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class OrderItem extends Model {

  public function order() {
    return $this->belongsTo(Order::class);
  }

  public function cartItem() {
    return $this->belongsTo(CartItem::class);
  }

}
