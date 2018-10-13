<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Colour;

use Auth;
use View;

class ViewComposerServiceProvider extends ServiceProvider {
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot(){
    $this->filters();
    $this->global();
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
  
  public function global(){

    view()->composer('*', function () {
      $categories = Category::where('parent_id', 0)->where('hide', false)->get();
      foreach ($categories as $category) {
        $category->subcategories = Category::where('parent_id', $category->id)->where('hide', false)->get();
      }
      View::share('categories', $categories);

      if (Auth::user()) {
        $cart = Cart::getCurrentUsersCart();
        $cartItems = [];
        if ($cart) {
          $cartItems = $cart->items;
        }

        View::share('globalCart', $cart);
        View::share('globalCartItems', $cartItems);
      }

    });

  }
	
	public function filters(){

    view()->composer('items*', function () {
      $brands = Brand::all();
      $colours = Colour::all();
      View::share('brands', $brands);
      View::share('colours', $colours);
    });

	}
	
}
