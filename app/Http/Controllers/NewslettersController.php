<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Newsletter;

use App\Exports\NewslettersExport;
use Maatwebsite\Excel\Facades\Excel;

class NewslettersController extends Controller {

  public function index(Request $request) {
    $newsletters = Newsletter::all();

    return view('newsletters.index', compact('newsletters'));
  }

  public function store(Request $request) {
    Newsletter::create($request->all());

    return redirect('/')->with('success', 'User Subscribed');
  }

  public function export() {
    return Excel::download(new NewslettersExport, 'subscribers.xlsx');
  }

}
