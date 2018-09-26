<?php

use Illuminate\Database\Seeder;

use App\Models\Item;

class ItemsTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $names = ['Dog', 'Cat', 'Donkey', 'Cow', 'Sheep', 'Goat', 'Snake', 'Bear', 'Fish'];
    $brands = ['Nike', 'Adidas', 'Puma', 'Samsung', 'Apple', 'Tesla', 'Jeep', 'Porsche', 'Mini'];
    foreach ($names as $key => $name) {
      $item = new Item;
      $item->name = $names[$key];
      $item->brand = $brands[$key];
      $primaryKey = $key + 1;
      $secondaryKey = $key + 2;
      if ($secondaryKey == 10) $secondaryKey = 1;
      $item->primary_image = "img/product-img/product-{$primaryKey}.jpg";
      $item->secondary_image = "img/product-img/product-{$secondaryKey}.jpg";
      $item->price = $key + 1;
      $item->save();
    }
  }
}
