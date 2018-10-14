@extends('layouts.app')

@section('content')
<!-- ##### Checkout Area Start ##### -->
<div class="section-padding-80">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <div class="mt-50 clearfix">

          <div class="cart-page-heading mb-30">
            <h5>Upload a New Item</h5>
          </div>

          {!! Form::open(['url' => '/order-requests', 'method' => 'POST', 'files' => true]) !!}
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" required>
            <div class="row">
              <div class="col-12 mb-3">
                <label for="name">Item Name <span>*</span></label>
                <input type="text" class="form-control" id="name" value="" name="name" required>
              </div>
              <div class="col-12 mb-3">
                <label for="name">Item Description <span>*</span></label>
                <textarea class="form-control" id="description" value="" name="description" required></textarea>
              </div>
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
              <div class="col-12 mb-3">
                <label for="secondary_image">Secondary Image</label>
                <input id="secondary_image" tabindex="-1" type="file" name="secondary_image">
              </div>
              <div class="col-12 mb-3">
                <label for="price">Price</label>
                <input class="form-control" id="price" tabindex="-1" type="text" name="price" onkeypress="return isNumberKey(event)" required>
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