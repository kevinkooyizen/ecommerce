<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
  protected $guarded = ['id'];
  protected $casts = [
    'hide' => 'boolean'
  ];
}
