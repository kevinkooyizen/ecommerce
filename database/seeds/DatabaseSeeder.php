<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  protected $toTruncate = [
    'users',
    'items',
  ];

  public function run() {
    foreach($this->toTruncate as $table) {
      DB::table($table)->truncate();
    }

    $this->call(UsersTableSeeder::class);
    $this->call(ItemsTableSeeder::class);
  }
}
