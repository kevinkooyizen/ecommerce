@extends('layouts.app')

@section('content')

<style type="text/css">
  .list {
    overflow-y: scroll !important;
    max-height: 300px !important;
  }
</style>

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Edit {{ $item->order_request?'Order Request':'Item' }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex">

  <!-- Single Product Thumb -->
  <div class="single_product_thumb mt-50">
    <img src="{{ $item->primary_image }}" alt="">
  </div>

  <div class="col-6 col-md-6">
    <div class="checkout_details_area mt-50 clearfix">

      <div class="cart-page-heading mb-30">
        <h5>Item Details</h5>
      </div>

      {!! Form::open(['url' => "items/$item->id", 'method' => "PUT", 'files' => true]) !!}
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
        <div class="row">
          <div class="col-12 mb-3">
            <label for="name">Item Name <span>*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" placeholder="{{ $item->order_request?"What do you want to buy?":"Item Name" }}" required>
          </div>
          <div class="col-12 mb-3">
            <label for="description">Item Description</label>
            <textarea class="form-control height-100" id="description" name="description" placeholder="{{ $item->order_request?"Describe your item e.g. size, quantity, colour, packaging, how to buy?":"Item Description" }}">{{ $item->description }}</textarea>
          </div>
          @if ($item->order_request)
            <div class="col-12 mb-3">
              <label for="area">Where to buy (Shop/Area)</label>
              <textarea class="form-control height-100" id="area" value="" name="area" placeholder="Please provide Shopname, Area or Street Name (Optional)">{{ $item->order_request->area }}</textarea>
            </div>
          @endif
          <div class="col-12 mb-3">
            <label for="category">Category <span>*</span></label>
            <select class="w-100" id="category" name="category_id">
              @foreach ($subCategories as $category)
                <option value="{{ $category->id }}" {{ $item->category_id == $category->id?'selected':'' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 mb-3">
            <label for="brand">Brand <span>*</span></label>
            <select class="w-100" id="brand" name="brand_id">
              @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ $item->brand_id == $brand->id?'selected':'' }}>{{ $brand->name }}</option>
              @endforeach
            </select>
          </div>
          {{-- <div class="col-12 mb-3">
            <label for="colour">Colour <span>*</span></label>
            <select class="w-100" id="colour" name="colour_id">
              @foreach ($colours as $colour)
                <option value="{{ $colour->id }}" {{ $item->colour_id == $colour->id?'selected':'' }}>{{ $colour->name }}</option>
              @endforeach
            </select>
          </div> --}}
          <div class="col-12 mb-3">
            <label for="primary_image">Primary Image <span>*</span></label>
            <input id="primary_image" tabindex="-1" type="file" name="primary_image">
          </div>
          @if ($item->order_request)
            <div class="col-12 mb-3">
              <label for="quantity">Item Quantity <span>*</span></label>
              <input class="form-control" id="quantity" name="quantity" value="{{ $item->order_request->quantity }}" required>
            </div>
            <div class="col-12 mb-3">
              <label for="expected_date">When you expect <span>*</span></label>
              <input class="form-control" id="expected_date" name="expected_date" value="{{ $item->order_request->expected_date }}" required>
            </div>
            <div class="col-12 mb-3">
              <label for="country">Country <span>*</span></label>
              <select class="w-100" name="country_id" id="country">
                @foreach ($countries as $country)
                  <option value="{{ $country->id }}" {{ $country->id == $item->order_request->country_id?'selected':'' }}>{{ $country->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 mb-3">
              <label for="url">URL</label>
              <input class="form-control" id="url" name="url" value="{{ $item->order_request->url }}">
            </div>
          @elseif (!$request->order_request)
            <div class="col-12 mb-3">
              <label for="secondary_image">Secondary Image</label>
              <input id="secondary_image" tabindex="-1" type="file" name="secondary_image">
            </div>
          @endif
          <div class="col-12 mb-3">
            <label for="price">Price <span>*</span></label>
            <input class="form-control" id="price" tabindex="-1" type="text" name="price" onkeypress="return isNumberKey(event)" value="{{ $item->price }}">
          </div>
          <div class="col-12 mb-3">
            <button class="btn essence-btn">Update Item</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</section>
<!-- ##### Single Product Details Area End ##### -->
@endsection