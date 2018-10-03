<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Order extends Model {

  public function item() {
    return $this->belongsTo(Item::class);
  }

  public function status() {
    return $this->belongsTo(Status::class);
  }

}
