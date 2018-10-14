@extends('layouts.app')

@section('content')
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex">

  <!-- Single Product Thumb -->
  <div class="single_product_thumb">
    <img src="{{ $item->primary_image }}" alt="">
  </div>

  <!-- Single Product Description -->
  <div class="single_product_desc clearfix">
    <span>{{ $item->brand->name }}</span>
    <h2>{{ $item->name }}</h2>
    <p class="product-price">
      @if ($item->order_request)
        Item Price + tips for traveller:
        <br>
      @endif
       RM {{ $item->price }}
    </p>
    <p class="product-desc">{{ $item->description }}</p>
    @if ($item->order_request)
      <p class="product-desc">Country: {{ $item->order_request->country->name }}</p>
      @if ($item->order_request->area)
        <p class="product-desc">Where to buy (Shop/Area): {{ $item->order_request->area }}</p>
      @endif
      <p class="product-desc">Quantity: {{ $item->order_request->quantity }}</p>
      <p class="product-desc">Expected On: {{ date("j M Y", strtotime($item->order_request->expected_date)) }}</p>
      @if ($item->order_request->url)
        <p class="product-desc">{{ $item->order_request->url }}</p>
      @endif
    @endif

    <!-- Form -->
    <form class="cart-form clearfix" action="#">
      <!-- Cart & Favourite Box -->
      <div class="cart-fav-box d-flex align-items-center">
        <!-- Cart -->
        @if (!$item->order_request)
          <button type="button" class="btn essence-btn" onclick="addToCart('{{ $item->id }}')">Add to cart</button>
        @elseif ($item->order_request)
          <button type="button" class="btn essence-btn" onclick="location.replace('/items/{{ $item->id }}/edit')">Edit Order Request</button>
        @endif
        <!-- Favourite -->
        <div class="product-favourite ml-4">
          {{-- <a href="#" class="favme fa fa-heart"></a> --}}
        </div>
      </div>
    </form>
  </div>
</section>
<!-- ##### Single Product Details Area End ##### -->

<script type="text/javascript">
  function addToCart(itemId) {
    status = checkLoggedIn();
    if (status == "false") return false;
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      url: '/cart-items',
      data: {
        itemId: itemId
      },
      dataType: 'JSON',
      success: function (data) {
        alert('Item Added');
        $('.cart-list').append('\
          <div class="single-cart-item" id="cart-item-' + data.id + '">\
            <a href="#" class="product-image">\
              <img src="' + data.addedItemProperties.primary_image + '" class="cart-thumb" alt="' + data.addedItemProperties.name + '">\
              <div class="cart-item-desc">\
                <span class="product-remove" onclick="removeFromCart(' + data.id + ')"><i class="fa fa-close" aria-hidden="true"></i></span>\
                  <span class="badge">' + data.addedItemProperties.brand + '</span>\
                  <h6>' + data.addedItemProperties.name + '</h6>\
                  <p class="price">$' + data.addedItemProperties.price + '</p>\
              </div>\
            </a>\
          </div>\
        ');
        $('#cart-subtotal')[0].innerHTML = "$" + data.subtotal;
        $('#cart-total')[0].innerHTML = "$" + data.total;
        $('.cart-item-count')[0].innerHTML = data.items.length;
        $('.cart-item-count')[1].innerHTML = data.items.length;
      },
      error: function (data) {
        @if (config('app.env') == "local")
          console.log('Request Status: ' + data.status + ' Status Text: ' + data.statusText + ' ' + data.responseText);
          debugger;
        @endif
      },
    });
  }

  function checkLoggedIn() {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'GET',
      url: '/users',
      dataType: 'JSON',
      async: false,
      success: function (data) {
        if (!data) {
          alert('Please log in first');
          result = false;
        } else if (data) {
          result = true;
        }
      },
      error: function (data) {
        @if (config('app.env') == "local")
          console.log('Request Status: ' + data.status + ' Status Text: ' + data.statusText + ' ' + data.responseText);
          debugger;
        @endif
      },
    });
    return result;
  }
</script>
@endsection