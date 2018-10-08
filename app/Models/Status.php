<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

  public static function newStatus() {
    return Status::where('name', "New")->first();
  }

  public static function pendingStatus() {
    return Status::where('name', "Pending")->first();
  }

  public static function cancelledStatus() {
    return Status::where('name', "Cancelled")->first();
  }

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
