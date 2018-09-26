<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next){
    if (Auth::user()) {
      if (!in_array(Auth::user()->id, explode(',', config('auth.admins')))){
        return redirect('/');
      }
    } else {
      return redirect('/');
    }
	
    return $next($request);
  }
}