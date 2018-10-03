<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Order extends Model {

  public function cart_item() {
    return $this->hasMany(CartItem::class);
  }

}
