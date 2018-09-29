<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoriesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $names = ['Clothing', 'Shoes', 'Accessories'];
    foreach ($names as $key => $name) {
      $category = new Category;
      $category->name = $name;
      $category->save();
    }

    $clothingSubCats = ['Bodysuits', 'Dresses', 'Hoodies & Sweats', 'Jackets & Coats', 'Jeans', 'Pants & Leggings', 'Rompers & Jumpsuits', 'Shirts & Blouses', 'Shirts', 'Sweaters & Knits'];
    foreach ($clothingSubCats as $key => $subCat) {
      $category = new Category;
      $category->name = $subCat;
      $category->parent_id = 1;
      $category->save();
    }
  }
}
