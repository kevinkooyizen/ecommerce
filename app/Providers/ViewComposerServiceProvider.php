<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Brand;
use App\Models\Category;

use View;

class ViewComposerServiceProvider extends ServiceProvider {
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot(){
    $this->shop();
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register(){
      //
  }
  
  /*
   * Compose the Default Variables.
   */
	
	public function shop(){
		view()->composer('shop*', function () {
      $categories = Category::where('parent_id', 0)->get();
      foreach ($categories as $category) {
        $category->subcategories = Category::where('parent_id', $category->id)->get();
      }
      $brands = Brand::all();
      View::share('categories', $categories);
      View::share('brands', $brands);
    });

	}
	
}
