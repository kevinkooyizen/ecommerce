<?php

use Illuminate\Database\Seeder;

use App\Models\Status;

class StatusesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $names = ['New', 'Pending', 'Cancelled'];
    foreach ($names as $name) {
      $colour = new Status;
      $colour->name = $name;
      $colour->save();
    }
  }
}
