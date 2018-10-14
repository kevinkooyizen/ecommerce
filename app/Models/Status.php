<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

  public static function getStatus($statusName) {
    $status = Status::where('name', $statusName)->first();
    if (!$status) {
      $status = new Status;
      $status->name = $statusName;
      $status->save();
    }
    return $status;
  }

}
