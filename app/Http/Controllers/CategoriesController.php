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
    $categories = Category::where('parent_id', 0)->get();
    return view('categories.index', compact('categories'));
  }

  public function create(Request $request) {

    return view('categories.create', compact('request'));
  }

  public function store(Request $request) {
    $category = new Category;
    $category->name = $request->name;
    if ($request->parent_id) $category->parent_id = $request->parent_id;
    $category->save();

    if ($request->parent_id) {
      return redirect("categories/$request->parent_id/edit");
    } elseif (!$request->parent_id) {
      return redirect('categories');
    }
  }

  public function edit(Request $request, $categoryId) {
    $category = Category::find($categoryId);
    $subCategories = Category::where('parent_id', $categoryId)->get();

    return view('categories.edit', compact('category', 'subCategories'));
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

    if ($request->parent_id) {
      return redirect("categories/$request->parent_id/edit");
    } elseif ($request->parent_id) {
      return redirect('categories');
    }

  }

}
