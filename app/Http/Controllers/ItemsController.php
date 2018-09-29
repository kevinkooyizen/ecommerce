<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

use DB;
use Input;
use Route;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
  public function index(Request $request) {
    $items = Item::query();
    if($request->search != 'all') $items->where('name','LIKE','%'.$request->search.'%');
    if($request->brand) $items->where('brand_id',$request->brand);
    if($request->colour) $items->where('colour_id',$request->colour);
    if($request->category) {
      $category = Category::find($request->category);
      $categoryIds = [$request->category];
      $children = Category::where('parent_id', $request->category)->get();
      foreach ($children as $child) {
        $categoryIds[] = $child->id;
      }
      $items->whereIn('category_id', $categoryIds);
    }

    if($request->minPrice) $items->where('price', '>=', $request->minPrice);
    if($request->maxPrice) $items->where('price', '<=', $request->maxPrice);
    if($request->sort == "latest") $items->orderBy('new', 'DESC');
    if($request->sort == "expensive") $items->orderBy('price', 'DESC');
    if($request->sort == "cheap") $items->orderBy('price', 'ASC');

    $items = $items->paginate(9);

    $request->minPrice = $items->min('price');
    $request->maxPrice = $items->max('price');

    return view('shop', compact('items', 'request'));
  }

  public function store(Request $request) {
    User::createAdmin($request);

    return redirect('admins')->with('success', 'User created');
  }
}
