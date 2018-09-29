<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

class ViewComposerServiceProvider extends ServiceProvider {
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot(){
    $this->categories();
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
	
	public function categories(){
		view()->composer('shop*', function () {
      print_r('test');exit;
    });

	}
	
}
