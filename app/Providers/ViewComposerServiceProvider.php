<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Colour;
use App\Models\Item;

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
    $this->home();
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
      $subCategories = Category::where('parent_id', '!=', 0)->where('hide', false)->get();
      View::share('subCategories', $subCategories);

      $brands = Brand::all();
      View::share('brands', $brands);

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
      // $colours = Colour::all();
      // View::share('colours', $colours);

      $countries = \DB::table('countries')->get();
      View::share('countries', $countries);
    });

  }
  
  public function home(){

    view()->composer('home', function () {
      $firstSixItems = Item::where('order_request_id', 0)->orderBy('created_at', 'DESC')->limit(6)->get();
      View::share('firstSixItems', $firstSixItems);
    });

	}
	
}
