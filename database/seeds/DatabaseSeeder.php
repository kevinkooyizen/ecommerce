<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  protected $toTruncate = [
    'users',
    'colours',
    'categories',
    'brands',
    'items',
    'carts',
    'cart_items',
    'orders',
    'statuses',
  ];

  public function run() {
    foreach($this->toTruncate as $table) {
      DB::table($table)->truncate();
    }

    $this->call(UsersTableSeeder::class);
    $this->call(ColoursTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(BrandsTableSeeder::class);
    $this->call(ItemsTableSeeder::class);
    $this->call(StatusesTableSeeder::class);
  }
}
