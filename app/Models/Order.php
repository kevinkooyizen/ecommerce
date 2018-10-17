<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Order extends Model {

  protected $guarded = [
    'id',
    'salesOrPurchases',
  ];

  public function item() {
    return $this->belongsTo(Item::class);
  }

  public function status() {
    return $this->belongsTo(Status::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }

}
