@extends('layouts.app')

@section('content')
<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-12">
        <div class="checkout_details_area mt-50 clearfix">
          @if (!$cartItems->isEmpty())
            {!! Form::open(['url' => "orders", 'method' => 'POST']) !!}
              <input type="hidden" name="cart_id" value="{{ $cart->id }}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th width="5%"></th>
                    <th width="15%"></th>
                    <th width="50%">Name</th>
                    <th width="20%">Price</th>
                    <th width="10%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cartItems as $cartItem)
                    <tr style="max-height: 200px;">
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="customCheck{{ $cartItem->id }}" type="checkbox" name="selectedItem[]" value="{{ $cartItem->item->id }}">
                          <label class="custom-control-label" for="customCheck{{ $cartItem->id }}"></label>
                        </div>
                      </td>
                      <td><img src="{{ $cartItem->item->primary_image }}"></td>
                      <td>{{ $cartItem->item->name }}</td>
                      <td>{{ $cartItem->item->price }}</td>
                      <td><button type="button" onclick="deleteCartItem('{{ $cartItem->id }}')" class="btn btn-danger">Delete</button></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <button class="btn pull-right btn-primary">Send Request</button>
            {{ Form::close() }}
          @else
            No Items in cart.
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->
<script type="text/javascript">
  function deleteCartItem($cartItemId) {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      url: '/cart-items/' + $cartItemId,
      data: {
        _method: 'DELETE',
      },
      dataType: 'JSON',
      success: function (data) {
        window.location.reload();
      },
      error: function (data) {
        @if (config('app.env') == "local")
          console.log('Request Status: ' + data.status + ' Status Text: ' + data.statusText + ' ' + data.responseText);
          debugger;
        @endif
      },
    });
  }
</script>
@endsection