@extends('layouts.app')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="page-title text-center">
          <h2>dresses</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
  <div class="container">
    <div class="row">
      {!! Form::open(['url' => 'shop', 'method' => 'GET', 'id' => 'searchForm']) !!}
        <input type="hidden" name="brand" value="{{ $request->brand }}">
        <input type="hidden" name="category" value="{{ $request->category }}">
      {{ Form::close() }}
      <div class="col-12 col-md-4 col-lg-3">
        <div class="shop_sidebar_area">

          <!-- ##### Single Widget ##### -->
          <div class="widget catagory mb-50">
            <!-- Widget Title -->
                
            <h6 class="widget-title mb-30">Categories</h6>

            <!--  Catagories  -->
            <div class="catagories-menu">
              <ul id="menu-content2" class="menu-content collapse show">
                @foreach ($categories as $key => $category)
                  <!-- Single Item -->
                  <li data-toggle="collapse" data-target="#{{ $category->name }}" class="{{ $key != 0?'collapsed':'' }}">
                    <a href="#">{{ $category->name }}</a>
                    <ul class="sub-menu collapse {{ $key == 0?'show':'' }}" id="{{ $category->name }}">
                      <li><a href="#" onclick="fillValue('category', '')">All</a></li>
                      @foreach ($category->subcategories as $subcategory)
                        <li><a href="#" onclick="fillValue('category', '{{ $subcategory->id }}')">{{ $subcategory->name }}</a></li>
                      @endforeach
                    </ul>
                  </li>
                @endforeach
              </ul>
            </div>
              
          </div>

          <!-- ##### Single Widget ##### -->
          <div class="widget price mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Filter by</h6>
            <!-- Widget Title 2 -->
            <p class="widget-title2 mb-30">Price</p>

            <div class="widget-desc">
                <div class="slider-range">
                    <div data-min="{{ round($items->min('price')) }}" data-max="{{ round($items->max('price')) }}" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="{{ round($items->min('price')) }}" data-value-max="{{ round($items->max('price')) }}" data-label-result="Range:">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="range-price">Range: {{ $items->min('price') }} - {{ $items->max('price') }}</div>
                </div>
            </div>
          </div>

          <!-- ##### Single Widget ##### -->
          <div class="widget color mb-50">
            <!-- Widget Title 2 -->
            <p class="widget-title2 mb-30">Color</p>
            <div class="widget-desc">
              <ul class="d-flex">
                <li><a href="#" class="color1"></a></li>
                <li><a href="#" class="color2"></a></li>
                <li><a href="#" class="color3"></a></li>
                <li><a href="#" class="color4"></a></li>
                <li><a href="#" class="color5"></a></li>
                <li><a href="#" class="color6"></a></li>
                <li><a href="#" class="color7"></a></li>
                <li><a href="#" class="color8"></a></li>
                <li><a href="#" class="color9"></a></li>
                <li><a href="#" class="color10"></a></li>
              </ul>
            </div>
          </div>

          <!-- ##### Single Widget ##### -->
          <div class="widget brands mb-50">
            <!-- Widget Title 2 -->
            <p class="widget-title2 mb-30">Brands</p>
            <div class="widget-desc">
              <ul>
                <li><a href="#" onclick="fillValue('brand', '')">All</a></li>
                @foreach ($brands as $brand)
                  <li><a href="#" onclick="fillValue('brand', '{{ $brand->id }}')">{{ $brand->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      

      <div class="col-12 col-md-8 col-lg-9">
          <div class="shop_grid_product_area">
              <div class="row">
                  <div class="col-12">
                      <div class="product-topbar d-flex align-items-center justify-content-between">
                          <!-- Total Products -->
                          <div class="total-products">
                              <p><span>{{ $items->count() }}</span> products found</p>
                          </div>
                          <!-- Sorting -->
                          <div class="product-sorting d-flex">
                              <p>Sort by:</p>
                              <form action="#" method="get">
                                  <select name="select" id="sortByselect">
                                      <option value="value">Highest Rated</option>
                                      <option value="value">Newest</option>
                                      <option value="value">Price: $$ - $</option>
                                      <option value="value">Price: $ - $$</option>
                                  </select>
                                  <input type="submit" class="d-none" value="">
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                @foreach ($items as $item)
                  <div class="col-12 col-sm-6 col-lg-4">
                      <div class="single-product-wrapper">
                          <!-- Product Image -->
                          <div class="product-img">
                            <img src="{{ $item->primary_image }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ $item->secondary_image }}" alt="">

                            <!-- Product Badge -->
                            @if ($item->discount > 0)
                              <div class="product-badge offer-badge">
                                <span>-{{ floatval($item->discount) }}%</span>
                              </div>
                            @elseif ($item->new)
                              <div class="product-badge new-badge">
                                <span>New</span>
                              </div>
                            @endif

                            <!-- Favourite -->
                            <div class="product-favourite">
                              <a href="#" class="favme fa fa-heart"></a>
                            </div>
                          </div>

                          <!-- Product Description -->
                          <div class="product-description">
                            <span>{{ $item->brand }}</span>
                            <a href="single-product-details.html">
                              <h6>{{ $item->name }}</h6>
                            </a>
                            <p class="product-price">
                              @if ($item->discount > 0)
                                <span class="old-price">${{ $item->price }}</span>
                              @endif
                               ${{ $item->price - $item->discount/100 }}
                            </p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                              <!-- Add to Cart -->
                              <div class="add-to-cart-btn">
                                <a href="#" class="btn essence-btn">Add to Cart</a>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                @endforeach

              </div>
          </div>
          <!-- Pagination -->
          <nav aria-label="navigation">
            <ul class="pagination mt-50 mb-70">
              <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">21</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </nav>
      </div>
    </div>
  </div>
</section>
<!-- ##### Shop Grid Area End ##### -->

<script type="text/javascript">
  function fillValue(key, value) {
    $('[name=' + key + ']').val(value);
    $('#searchForm').submit();
  }
</script>
@endsection