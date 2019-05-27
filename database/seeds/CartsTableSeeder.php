<?php

use Illuminate\Database\Seeder;

use App\Models\Cart;

class CartsTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $cart = new Cart;
    $cart->user_id = 1;
    $cart->save();
  }
}
