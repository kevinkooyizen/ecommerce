@extends('layouts.app')

@section('content')
<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-12">
        <div class="checkout_details_area mt-50 clearfix">
          @if (!$cartItems->isEmpty())
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="10%"></th>
                  <th>Name</th>
                  <th width="10%"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartItems as $cartItem)
                  <tr style="max-height: 200px;">
                    <td><img src="{{ $cartItem->item->primary_image }}"></td>
                    <td>{{ $cartItem->item->name }}</td>
                    {!! Form::open(['url' => "cart-items/$cartItem->id", 'method' => 'DELETE']) !!}
                      <td><button class="btn btn-danger">Delete</button></td>
                    {{ Form::close() }}
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            No Items in cart.
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection