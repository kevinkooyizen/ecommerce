<?php

use Illuminate\Database\Seeder;

use App\Models\Brand;
use App\Models\Colour;
use App\Models\Item;
use App\Models\Category;

class ItemsTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $names = ['Dog', 'Cat', 'Donkey', 'Cow', 'Sheep', 'Goat', 'Snake', 'Bear', 'Fish'];
    $brands = Brand::all();
    $colours = Colour::all();
    $clothingCategory = Category::where('name', 'clothing')->first();
    foreach ($names as $key => $name) {
      $item = new Item;
      $item->name = $names[$key];
      $item->description = "This is " . $item->name;
      $item->user_id = 1;
      $item->category_id = $clothingCategory->id;
      $item->brand_id = rand(1,sizeof($brands)-1);
      $item->colour_id = rand(1,sizeof($colours)-1);
      $primaryKey = $key + 1;
      $secondaryKey = $key + 2;
      if ($secondaryKey == 10) $secondaryKey = 1;
      $item->primary_image = "/img/product-img/product-{$primaryKey}.jpg";
      $item->secondary_image = "/img/product-img/product-{$secondaryKey}.jpg";
      $item->new = rand(0,1);
      $item->price = rand(1,1000);
      $item->discount = rand(0,100);
      $item->save();
    }
  }
}
