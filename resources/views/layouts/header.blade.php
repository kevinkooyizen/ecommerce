<!-- ##### Header Area Start ##### -->
<header class="header_area">
  <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
    <!-- Classy Menu -->
    <nav class="classy-navbar" id="essenceNav">
      <!-- Logo -->
      <a class="nav-brand" href="/"><img src="img/core-img/logo.png" alt=""></a>
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
                        <li class="title">Women's Collection</li>
                        <li><a href="/shop">Dresses</a></li>
                        <li><a href="/shop">Blouses &amp; Shirts</a></li>
                        <li><a href="/shop">T-shirts</a></li>
                        <li><a href="/shop">Rompers</a></li>
                        <li><a href="/shop">Bras &amp; Panties</a></li>
                    </ul>
                    <ul class="single-mega cn-col-4">
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
                    </ul>
                    <div class="single-mega cn-col-4">
                        <img src="img/bg-img/bg-6.jpg" alt="">
                    </div>
                </div>
            </li>
            <li><a href="#">Pages</a>
              <ul class="dropdown">
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                {{-- <li><a href="single-product-details.html">Product Details</a></li> --}}
                <li><a href="checkout.html">Checkout</a></li>
                {{-- <li><a href="blog.html">Blog</a></li> --}}
                {{-- <li><a href="single-blog.html">Single Blog</a></li> --}}
                {{-- <li><a href="regular-page.html">Regular Page</a></li> --}}
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </li>
            {{-- <li><a href="blog.html">Blog</a></li> --}}
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div>
        <!-- Nav End -->
      </div>
    </nav>

    <!-- Header Meta Data -->
    <div class="header-meta d-flex clearfix justify-content-end">
      <!-- Search Area -->
      {{-- <div class="search-area">
        <form action="#" method="post">
          <input type="search" name="search" id="headerSearch" placeholder="Type for search">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div> --}}
      <!-- Favourite Area -->
      {{-- <div class="favourite-area">
        <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
      </div> --}}
      <!-- User Login Info -->
      <div class="user-login-info">
        <a href="#" class="dropdown-toggle d-flex w-100" data-toggle="dropdown">
          <div class="d-flex justify-content-center">
            <span class="text-nowrap position-static margin-right-10 margin-left-25">{{ Auth::user()?Auth::user()->name:'Login' }}</span>
            <img class="h-100 margin-right-25" src="img/core-img/user.svg" alt="Login">
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
            <a class="dropdown-item line-height-20 text-left w-100" href="#">Profile</a>
            <a class="dropdown-item line-height-20 text-left w-100" href="#" onclick="$('#logoutForm').submit();">Logout</a>
            {!! Form::open(['url' => '/logout', 'method' => 'POST', 'id' => 'logoutForm']) !!}
              <input type="hidden" name="currentRoute" value="{{ Route::getFacadeRoot()->current()->uri() }}">
            {{ Form::close() }}
          </div>
        @endif
      </div>
      <!-- Cart Area -->
      <div class="cart-area">
        <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
      </div>
    </div>

  </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="img/product-img/product-1.jpg" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                      <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <span class="badge">Mango</span>
                        <h6>Button Through Strap Mini Dress</h6>
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p>
                        <p class="price">$45.00</p>
                    </div>
                </a>
            </div>

            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="img/product-img/product-2.jpg" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                      <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <span class="badge">Mango</span>
                        <h6>Button Through Strap Mini Dress</h6>
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p>
                        <p class="price">$45.00</p>
                    </div>
                </a>
            </div>

            <!-- Single Cart Item -->
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="img/product-img/product-3.jpg" class="cart-thumb" alt="">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                      <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                        <span class="badge">Mango</span>
                        <h6>Button Through Strap Mini Dress</h6>
                        <p class="size">Size: S</p>
                        <p class="color">Color: Red</p>
                        <p class="price">$45.00</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Summary</h2>
            <ul class="summary-table">
                <li><span>subtotal:</span> <span>$274.00</span></li>
                <li><span>delivery:</span> <span>Free</span></li>
                <li><span>discount:</span> <span>-15%</span></li>
                <li><span>total:</span> <span>$232.00</span></li>
            </ul>
            <div class="checkout-btn mt-100">
                <a href="checkout.html" class="btn essence-btn">check out</a>
            </div>
        </div>
    </div>
</div>
<!-- ##### Right Side Cart End ##### -->