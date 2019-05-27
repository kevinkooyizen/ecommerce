<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use Illuminate\Http\Request;

class BrandsController extends Controller {

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request) {
    $brands = Brand::all();
    return view('brands.index');
  }

  public function create(Request $request) {

    return view('brands.create', compact('request'));
  }

  public function store(Request $request) {
    $brand = new Brand;
    $brand->name = $request->name;
    $brand->save();

    return redirect('brands');
  }

  public function edit(Request $request, $brandId) {
    $brand = Brand::find($brandId);

    return view('brands.edit', compact('brand'));
  }

  public function update(Request $request, $brandId) {
    $brand = Brand::find($brandId);
    if ($request->action == "hide") {
      $brand->hide = true;
    } elseif ($request->action == "unhide") {
      $brand->hide = false;
    } else {
      $brand->update($request->all());
    }
    $brand->save();

    return redirect('brands');

  }

}
