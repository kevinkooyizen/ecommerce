<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Auth;

use Illuminate\Http\Request;

class CategoriesController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request) {
    return view('categories.index');
  }

  public function edit(Request $request, $categoryId) {
    $category = Category::find($categoryId);
    return view('categories.edit', compact('category'));
  }

  public function update(Request $request, $categoryId) {
    $category = Category::find($categoryId);
    if ($request->action == "hide") {
      $category->hide = true;
    } elseif ($request->action == "unhide") {
      $category->hide = false;
    } else {
      $category->update($request->all());
    }
    $category->save();

    return redirect('categories');
  }

}
