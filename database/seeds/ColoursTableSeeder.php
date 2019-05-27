<?php

use Illuminate\Database\Seeder;

use App\Models\Colour;

class ColoursTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $colourNames = ['White', 'Grey', 'Black', 'Blue', 'Red', 'Yellow', 'Orange', 'Brown', 'Green', 'Purple'];
    foreach ($colourNames as $colourName) {
      $colour = new Colour;
      $colour->name = $colourName;
      $colour->save();
    }
  }
}
