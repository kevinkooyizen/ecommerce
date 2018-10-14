<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Newsletter;

class NewslettersController extends Controller {

  public function store(Request $request) {
    Newsletter::create($request->all());

    return redirect('/')->with('success', 'User Subscribed');
  }

}
