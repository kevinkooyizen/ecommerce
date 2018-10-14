<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Item extends Model {

  protected $fillable = [
    'name',
    'description',
    'user_id',
    'category_id',
    'brand_id',
    'colour_id',
    'new',
    'price',
    'discount',
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function brand() {
    return $this->belongsTo(Brand::class);
  }

  public function order_request() {
    return $this->belongsTo(OrderRequest::class);
  }

  public static function searchItem($request, $items = null) {
    if (!$items) $items = Item::query();
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

    $items = $items->paginate(18);
    return $items;
  }

  public static function storeItem($request) {
    $item = Item::create($request->all());
    $item = storeImage($item, $request);

    if ($request->order_request) {
      $orderRequest = OrderRequest::storeOrderRequest($request);
      $item->order_request_id = $orderRequest->id;
    }
    $item->save();

    return $item;
  }

  public static function updateItem($request, $itemId) {
    $item = Item::find($itemId);
    $item = storeImage($item, $request);
    $item->update($request->all());

    if ($item->order_request) {
      $orderRequest = $item->order_request;
      $orderRequest->country_id = $request->country_id;
      $orderRequest->area = $request->area;
      $orderRequest->quantity = $request->quantity;
      $orderRequest->expected_date = date("Y-m-d", strtotime($request->expected_date));
      $orderRequest->url = $request->url;
      $orderRequest->save();
    }

    return $item;
  }

  public static function searchOwnerItem($request) {
    $items = Item::query();
    $items->where('user_id', Auth::user()->id);

    $items = self::searchItem($request, $items);

    return $items;
  }

  public static function shopItems($request) {
    $items = Item::query();
    $items->where('order_request_id', 0);

    $items = self::searchItem($request, $items);

    return $items;
  }
  
}
