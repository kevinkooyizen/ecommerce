@extends('layouts.app')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Add Brand</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex justify-content-center">

  <div class="col-6 col-md-6">
    <div class="checkout_details_area mt-50 clearfix">

      <div class="cart-page-heading mb-30">
        <h5>Brand Details</h5>
      </div>

      {!! Form::open(['url' => "brands", 'method' => "POST"]) !!}
        <input type="hidden" name="parent_id" value="{{ $request->parent_id }}">
        <div class="row">
          <div class="col-12 mb-3">
            <label for="name">Name <span>*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="" required>
          </div>
          <div class="col-12 mb-3">
            <button class="btn essence-btn">Add Brand</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</section>
@endsection