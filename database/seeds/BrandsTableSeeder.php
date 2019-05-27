<?php

use Illuminate\Database\Seeder;

use App\Models\Brand;

class BrandsTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $brands = ['Nike', 'Adidas', 'Puma', 'Samsung', 'Apple', 'Tesla', 'Jeep', 'Porsche', 'Mini'];
    foreach ($brands as $key => $brand) {
      $category = new Brand;
      $category->name = $brand;
      $category->save();
    }
  }
}
