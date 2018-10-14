@extends('layouts.app')

@section('content')
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/hb-2.jpeg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    {{-- <h6>asoss</h6> --}}
                    <h2 style="color: white">Health & <br>Beauty</h2>
                    <a href="/shop" class="btn essence-btn">All Products</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <h3 style="color: #0315ff">Coming Soon</h3>
        <br>
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4 watermark">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/korea.jpg);">
                    <div class="catagory-content">
                        <a href="#" style="">Korea</a>
                    </div>
                    {{-- <p id="bg-text">Coming soon</p> --}}
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/japan.jpg);">
                    <div class="catagory-content">
                        <a href="#">Japan</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/taiwan.jpg);">
                    <div class="catagory-content">
                        <a href="#">Taiwan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/hb-3.jpeg);">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            {{-- <h6>-60%</h6> --}}
                            {{-- <h2>Global Sale</h2> --}}
                            {{-- <a href="#" class="btn essence-btn">Buy Now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading text-center">
          <h2>All Products</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="popular-products-slides owl-carousel">
          @foreach ($firstSixItems as $item)
            <!-- Single Product -->
            <div class="single-product-wrapper">
                <!-- Product Image -->
                <div class="product-img" style="height: 300px;">
                  <img src="{{ $item->primary_image }}" alt="" style="height: 100%">
                  <!-- Hover Thumb -->
                  <img class="hover-img" src="{{ $item->secondary_image }}" alt="" style="height: 100%">

                  @if ($item->new)
                    <div class="product-badge new-badge">
                      <span>New</span>
                    </div>
                  @endif
                </div>
                <!-- Product Description -->
                <div class="product-description">
                  <span>{{ $item->brand->name }}</span>
                  <a href="/items/{{ $item->id }}">
                    <h6>{{ $item->name }}</h6>
                  </a>
                  <p class="product-price">
                    {{-- @if ($item->discount > 0)
                      <span class="old-price">${{ $item->price }}</span>
                    @endif --}}
                    {{-- RM {{ $item->price - $item->discount/100 }} --}}
                    RM {{ $item->price }}
                  </p>

                  <!-- Hover Content -->
                  <div class="hover-content">
                    <!-- Add to Cart -->
                    <div class="add-to-cart-btn">
                      <a href="#" class="btn essence-btn" onclick="addToCart({{ $item->id }})">Add to Cart</a>
                    </div>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="section-heading">
          <i class="fa fa-lightbulb-o"></i> <strong>Have something else in mind?</strong>
          <button type="button" onclick="location.replace('/items/create?order_request=true')" class="btn btn-info pull-right">Make a new request</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
  <!-- Brand Logo -->
  <div class="single-brands-logo">
    <img src="img/core-img/b.liv.jpeg" alt="" style="max-width: 250px;">
  </div>
  <!-- Brand Logo -->
  <div class="single-brands-logo">
    <img src="img/core-img/Hada Labo.jpeg" alt="" style="max-width: 250px;">
  </div>
  <!-- Brand Logo -->
  <div class="single-brands-logo">
    <img src="img/core-img/Loreal.jpeg" alt="" style="max-width: 250px;">
  </div>
  <!-- Brand Logo -->
  <div class="single-brands-logo">
    <img src="img/core-img/Maybelline.jpeg" alt="" style="max-width: 250px;">
  </div>
  <!-- Brand Logo -->
  <div class="single-brands-logo">
    <img src="img/core-img/NYX.jpeg" alt="" style="max-width: 250px;">
  </div>
  <!-- Brand Logo -->
  <div class="single-brands-logo">
    <img src="img/core-img/Pantene.jpeg" alt="" style="max-width: 250px;">
  </div>
</div>
<!-- ##### Brands Area End ##### -->

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