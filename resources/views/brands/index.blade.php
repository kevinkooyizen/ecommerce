@extends('layouts.app')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Brands</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-12">
        <div class="checkout_details_area mt-50 clearfix">
          @if (!$brands->isEmpty())
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="20%">Name</th>
                  <th width="80%"><button onclick="location.replace('/brands/create')" class="btn btn-info pull-right">New Brand</button></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brands as $brand)
                  <tr style="max-height: 200px;">
                    <td>{{ $brand->name }}</td>
                    <td>
                      <button onclick="location.replace('/brands/{{ $brand->id }}/edit')" class="btn btn-warning margin-right-25 pull-left"><i class="fa fa-pencil"></i> Edit Brand</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            No Categories
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection