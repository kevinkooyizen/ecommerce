<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Newsletter;

use App\Exports\NewslettersExport;
use Maatwebsite\Excel\Facades\Excel;

class NewslettersController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function store(Request $request) {
    Newsletter::create($request->all());

    return redirect('/')->with('success', 'User Subscribed');
  }

  public function export() {
    return Excel::download(new NewslettersExport, 'subscribers.xlsx');
  }

}
