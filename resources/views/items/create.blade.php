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
          <h2>{{ $request->order_request?"New request":"New Item" }}</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="section-padding-80">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <div class="mt-50 clearfix">

          <div class="cart-page-heading mb-30">
            <h5>{{ $request->order_request?"Create a new request":"Upload a New Item" }}</h5>
          </div>

          {!! Form::open(['url' => 'items', 'method' => 'POST', 'files' => true]) !!}
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            @if ($request->order_request)
              <input type="hidden" value="true" name="order_request">
            @endif
            <div class="row">
              <div class="col-12 mb-3">
                <label for="name">Item Name <span>*</span></label>
                <input type="text" class="form-control" id="name" value="" name="name" placeholder="{{ $request->order_request?"What do you want to buy?":"Item Name" }}" required>
              </div>
              <div class="col-12 mb-3">
                <label for="description">Item Description <span>*</span></label>
                <textarea class="form-control" id="description" value="" name="description" placeholder="{{ $request->order_request?"Describe your item e.g. size, quantity, colour, packaging, how to buy?":"Item Description" }}" required></textarea>
              </div>
              @if ($request->order_request)
                <div class="col-12 mb-3">
                  <label for="area">Where to buy (Shop/Area)</label>
                  <textarea class="form-control" id="area" value="" name="area" placeholder="Please provide Shopname, Area or Street Name (Optional)"></textarea>
                </div>
              @endif
              <div class="col-12 mb-3">
                <label for="category">Category <span>*</span></label>
                <select class="w-100" id="category" name="category_id">
                  @foreach ($subCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="brand">Brand <span>*</span></label>
                <select class="w-100" id="brand" name="brand_id">
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                  @endforeach
                </select>
              </div>
              {{-- <div class="col-12 mb-3">
                <label for="colour">Colour <span>*</span></label>
                <select class="w-100" id="colour" name="colour_id">
                  @foreach ($colours as $colour)
                    <option value="{{ $colour->id }}">{{ $colour->name }}</option>
                  @endforeach
                </select>
              </div> --}}
              <div class="col-12 mb-3">
                <label for="primary_image">Primary Image <span>*</span></label>
                <input id="primary_image" tabindex="-1" type="file" name="primary_image" required>
              </div>
              @if ($request->order_request)
                <div class="col-12 mb-3">
                  <label for="quantity">Item Quantity <span>*</span></label>
                  <input class="form-control" id="quantity" name="quantity" value="1" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="expected_date">When you expect <span>*</span></label>
                  <input class="form-control" id="expected_date" name="expected_date" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="country">Country <span>*</span></label>
                  <select class="w-100" name="country_id" id="country">
                    @foreach ($countries as $country)
                      <option value="{{ $country->id }}" {{ config('app.main_country') == $country->name?'selected':'' }}>{{ $country->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12 mb-3">
                  <label for="url">URL</label>
                  <input class="form-control" id="url" name="url">
                </div>
              @endif
              @if (!$request->order_request)
                <div class="col-12 mb-3">
                  <label for="secondary_image">Secondary Image</label>
                  <input id="secondary_image" tabindex="-1" type="file" name="secondary_image">
                </div>
              @endif
              <div class="col-12 mb-3">
                <label for="price">{{ $request->order_request?"Item Price + tips for traveller in MYR":"Item Price" }} <span>*</span></label>
                <input class="form-control" id="price" type="text" name="price" onkeypress="return isNumberKey(event)" required>
              </div>
            </div>
            <button class="btn essence-btn">Upload Item</button>
          {{ Form::close() }}
        </div>
      </div>
    </div>

  </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection