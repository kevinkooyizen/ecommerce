{{-- ##### Header Area Start ##### --}}
<header class="header_area">
  <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
    <!-- Classy Menu -->
    <nav class="classy-navbar" id="essenceNav">
      <!-- Logo -->
      <a class="nav-brand" href="/" style="max-width: 160px;">
        <img src="/img/core-img/bravel-logo.png" alt="">
      </a>
      <!-- Navbar Toggler -->
      <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
      </div>
      <!-- Menu -->
      <div class="classy-menu">
        <!-- close btn -->
        <div class="classycloseIcon">
          <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>
        <!-- Nav Start -->
        <div class="classynav">
          <ul>
            <li><a href="/shop">Shop</a>
                <div class="megamenu">
                    <ul class="single-mega cn-col-4">
                        {{-- <li class="title">Women's Collection</li> --}}
                        @foreach ($categories as $category)
                          <li><a href="/shop?category={{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                    {{-- <ul class="single-mega cn-col-4">
                        <li class="title">Men's Collection</li>
                        <li><a href="/shop">T-Shirts</a></li>
                        <li><a href="/shop">Polo</a></li>
                        <li><a href="/shop">Shirts</a></li>
                        <li><a href="/shop">Jackets</a></li>
                        <li><a href="/shop">Trench</a></li>
                    </ul>
                    <ul class="single-mega cn-col-4">
                        <li class="title">Kid's Collection</li>
                        <li><a href="/shop">Dresses</a></li>
                        <li><a href="/shop">Shirts</a></li>
                        <li><a href="/shop">T-shirts</a></li>
                        <li><a href="/shop">Jackets</a></li>
                        <li><a href="/shop">Trench</a></li>
                    </ul> --}}
                    <div class="single-mega cn-col-4">
                        <img src="/img/bg-img/hb-1.jpeg" alt="">
                    </div>
                </div>
            </li>
            {{-- <li><a href="#">Pages</a>
              <ul class="dropdown">
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="single-product-details.html">Product Details</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="single-blog.html">Single Blog</a></li>
                <li><a href="regular-page.html">Regular Page</a></li>
                <li><a href="/contact">Contact</a></li>
              </ul>
            </li> --}}
            {{-- <li><a href="blog.html">Blog</a></li> --}}
            {{-- <li><a href="/contact">Contact Us</a></li> --}}
          </ul>
        </div>
        <!-- Nav End -->
      </div>
    </nav>

    <!-- Header Meta Data -->
    <div class="header-meta d-flex clearfix justify-content-end">
      <!-- Search Area -->
      <div class="search-area">
        {!! Form::open(['url' => '/shop', 'method' => 'GET']) !!}
          <input type="search" name="search" id="headerSearch" placeholder="Type for search">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        {{ Form::close() }}
      </div>
      <!-- Favourite Area -->
      {{-- <div class="favourite-area">
        <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
      </div> --}}
      <!-- User Login Info -->
      <div class="user-login-info">
        <a href="#" class="dropdown-toggle d-flex w-100" data-toggle="dropdown">
          <div class="d-flex justify-content-center">
            <span class="text-nowrap position-static margin-right-10 margin-left-25">{{ Auth::user()?Auth::user()->name:'Login' }}</span>
            <img class="h-100 margin-right-25" src="/img/core-img/user.svg" alt="Login">
          </div>
        </a>
        @if (!Auth::user())
          <div class="dropdown-menu">
            {!! Form::open(['url' => 'login', 'method' => 'POST', 'class' => 'px-4 py-3']) !!}
              <input type="hidden" name="currentRoute" value="{{ Route::getFacadeRoot()->current()->uri() }}">
              <div class="form-group">
                <label for="exampleDropdownFormEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleDropdownFormEmail1" name="email" autocomplete="off" placeholder="email@example.com">
              </div>
              <div class="form-group">
                <label for="exampleDropdownFormPassword1">Password</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="password" placeholder="Password">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                <label class="form-check-label" for="dropdownCheck">
                  Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item line-height-20" href="/register">New around here? Sign up</a>
            {{-- <a class="dropdown-item line-height-20" href="#">Forgot password?</a> --}}
          </div>
        @else
          <div class="dropdown-menu">
            <a class="dropdown-item line-height-20 text-left w-100" href="/items/owner-shop">My Shop</a>
            <a class="dropdown-item line-height-20 text-left w-100" href="/orders/purchase-requests">Purchase Orders</a>
            <a class="dropdown-item line-height-20 text-left w-100" href="/orders/sale-requests">Sales Orders</a>
            <a class="dropdown-item line-height-20 text-left w-100" href="#" onclick="$('#logoutForm').submit();">Logout</a>
            {!! Form::open(['url' => '/logout', 'method' => 'POST', 'id' => 'logoutForm']) !!}
              <input type="hidden" name="currentRoute" value="{{ Route::getFacadeRoot()->current()->uri() }}">
            {{ Form::close() }}
          </div>
        @endif
      </div>
      @if (Auth::user())
        @if (Auth::user()->admin)
          <!-- Admin Options -->
          <div class="user-login-info">
            <a href="#" class="dropdown-toggle d-flex w-100" data-toggle="dropdown">
              <div class="d-flex justify-content-center">
                <span class="text-nowrap position-static margin-right-10 margin-left-10" style="color: black;">Admin <i class="fa fa-gears"></i></span>
              </div>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item line-height-20 text-left w-100" href="/categories">Categories</a>
              <a class="dropdown-item line-height-20 text-left w-100" href="/brands">Brands</a>
            </div>
          </div>
        @endif
        <!-- Cart Area -->
        <div class="cart-area">
          <a href="/carts/{{ $globalCart->id }}" class="d-flex w-100 margin-right-5">
            <div class="d-flex justify-content-center">
              <span class="text-nowrap position-static margin-right-10 margin-left-25">My Cart</span>
              <img src="/img/core-img/bag.svg" class="h-100 margin-right-25" alt=""> 
              <span class="cart-item-count" style="right: 10px;float: left;width: 20px;text-align: left;">{{ $globalCart->items->count() }}</span>
            </div>
          </a>
        </div>
      @endif
    </div>

  </div>
</header>
<!-- ##### Header Area End ##### -->

@if (Auth::user())
  <!-- ##### Right Side Cart Area ##### -->
  <div class="cart-bg-overlay"></div>

  <div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
      <a href="#" id="rightSideCart"><img src="/img/core-img/bag.svg" alt=""><span class="cart-item-count">{{ $globalCart->items->count() }}</span></a>
    </div>

    <div class="cart-content d-flex">

      <!-- Cart List Area -->
      <div class="cart-list">
        @foreach ($globalCartItems as $cartItem)
          <!-- Single Cart Item -->
          <div class="single-cart-item" id="cart-item-{{ $cartItem->id }}">
            <a href="#" class="product-image">
              <img src="{{ $cartItem->item->primary_image }}" class="cart-thumb" alt="{{ $cartItem->item->name }}">
              <!-- Cart Item Desc -->
              <div class="cart-item-desc">
                <span class="product-remove" onclick="removeFromCart('{{ $cartItem->id }}')"><i class="fa fa-close" aria-hidden="true"></i></span>
                  <span class="badge">{{ $cartItem->item->brand }}</span>
                  <h6>{{ $cartItem->item->name }}</h6>
                  {{-- <p class="size">Size: S</p> --}}
                  {{-- <p class="color">Color: Red</p> --}}
                  <p class="price">${{ $cartItem->item->price }}</p>
              </div>
            </a>
          </div>
        @endforeach
      </div>

      <!-- Cart Summary -->
      <div class="cart-amount-summary">

        <h2>Summary</h2>
        <ul class="summary-table">
          <li><span>subtotal:</span> <span id="cart-subtotal">${{ $globalCart->subtotal }}</span></li>
          {{-- <li><span>delivery:</span> <span>Free</span></li> --}}
          {{-- <li><span>discount:</span> <span>-15%</span></li> --}}
          <li><span>total:</span> <span id="cart-total">${{ $globalCart->total }}</span></li>
        </ul>
        @if ($globalCart->total > 0)
          <div class="checkout-btn mt-100">
            <a href="/carts/{{ $globalCart->id }}" class="btn essence-btn">check out</a>
          </div>
        @endif
      </div>
    </div>
  </div>
  <!-- ##### Right Side Cart End ##### -->
@endif

<script type="text/javascript">
  function removeFromCart(itemId) {
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      url: 'cart-items/' + itemId,
      data: {
        _method: 'DELETE',
      },
      dataType: 'JSON',
      success: function (data) {
        alert('Item Removed');
        $('#cart-item-' + data.deletedItemId).fadeOut(1000);
        $('#cart-subtotal')[0].innerHTML = "$" + data.subtotal;
        $('#cart-total')[0].innerHTML = "$" + data.total;
        if (data.items) {
          itemsCount = data.items.length;
        } else if (!data.items) {
          itemsCount = 0;
        }
        $('.cart-item-count')[0].innerHTML = itemsCount;
        $('.cart-item-count')[1].innerHTML = itemsCount;
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