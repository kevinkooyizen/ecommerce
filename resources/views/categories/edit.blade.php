@extends('layouts.app')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Edit Category</h2>
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
        <h5>Category Details</h5>
      </div>

      {!! Form::open(['url' => "categories/$category->id", 'method' => "PUT"]) !!}
        <input type="hidden" name="parent_id" value="{{ $category->parent_id }}">
        <div class="row">
          <div class="col-12 mb-3">
            <label for="name">Name <span>*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
          </div>
          <div class="col-12 mb-3">
            <button class="btn essence-btn">Update Category</button>
          </div>
        </div>
      {{ Form::close() }}
      @if (!$category->parent_id)
        @if (!$subCategories->isEmpty())
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="20%">Name</th>
                <th width="80%"><button class="btn btn-info pull-right">New Sub Category</button></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subCategories as $category)
                <tr style="max-height: 200px;">
                  <td>{{ $category->name }}</td>
                  <td>
                    <button onclick="location.replace('/categories/{{ $category->id }}/edit')" class="btn btn-warning margin-right-25 pull-left"><i class="fa fa-pencil"></i> Edit Category</button>
                    {!! Form::open(['url' => "categories/$category->id", 'method' => 'PUT']) !!}
                      @if ($category->hide)
                        <button class="btn btn-secondary margin-right-25"><i class="fa fa-eye"></i> Unhide Category</button>
                        <input type="hidden" name="action" value="unhide">
                        <input type="hidden" name="parent_id" value="{{ $category->parent_id }}">
                      @elseif (!$category->hide)
                        <button class="btn btn-secondary margin-right-25"><i class="fa fa-eye-slash"></i> Hide Category</button>
                        <input type="hidden" name="parent_id" value="{{ $category->parent_id }}">
                        <input type="hidden" name="action" value="hide">
                      @endif
                    {{ Form::close() }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          No Sub Categories
        @endif
      @endif
    </div>
  </div>

</section>
@endsection