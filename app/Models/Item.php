<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

  protected $fillable = [
    'name',
    'user_id',
    'category_id',
    'brand_id',
    'colour_id',
    'primary_image',
    'secondary_image',
    'new',
    'price',
    'discount',
  ];

  public static function searchItem($request) {
    $items = Item::query();
    if($request->search) $items->where('name','LIKE','%'.$request->search.'%');
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

    return $items;
  }

  public static function storeItem($request) {
    $item = Item::create($request->all());
    $item = storeImage($item, $request);
    $item->save();

    return $item;
  }
  
}
