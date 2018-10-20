<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
  <div class="container">
    <div class="row">
      @if ($request->path() == "shop")
        {!! Form::open(['url' => 'shop', 'method' => 'GET', 'id' => 'search-form']) !!}
      @elseif ($request->path() == "items/owner-shop")
        {!! Form::open(['url' => '/items/owner-shop', 'method' => 'GET', 'id' => 'search-form']) !!}
      @elseif ($request->path() == "order-requests")
        {!! Form::open(['url' => '/order-requests', 'method' => 'GET', 'id' => 'search-form']) !!}
      @endif
        <input type="hidden" name="brand" value="{{ $request->brand }}">
        <input type="hidden" name="category" value="{{ $request->category }}">
        <input type="hidden" name="colour" value="{{ $request->colour }}">
        <input type="hidden" name="minPrice" value="{{ $request->minPrice }}">
        <input type="hidden" name="maxPrice" value="{{ $request->maxPrice }}">
        <input type="hidden" name="sort" value="{{ $request->sort }}">
      {{ Form::close() }}
      <div class="col-12 col-md-4 col-lg-3">
        <div class="shop_sidebar_area">

          <!-- ##### Single Widget ##### -->
          <div class="widget catagory mb-50">
            <!-- Widget Title -->
            @if ($request->path() == "items/owner-shop")
              <button class="btn btn-primary" onclick="location.replace('/items/create')">Add Item</button>
              <br>
              <br>
            @elseif ($request->path() == "order-requests")
              <button class="btn btn-info" onclick="location.replace('/items/create?order_request=true')">Make a new request</button>
              <br>
              <br>
            @endif
            <h6 class="widget-title mb-30">Categories</h6>

            <!--  Catagories  -->
            <div class="catagories-menu">
              <ul id="menu-content2" class="menu-content collapse show">
                @foreach ($categories as $key => $category)
                  <!-- Single Item -->
                  <li data-toggle="collapse" data-target="#{{ $category->name }}" class="{{ $key != 0?'collapsed':'' }}">
                    <a href="#">{{ $category->name }}</a>
                    <ul class="sub-menu collapse {{ $key == 0?'show':'' }}" id="{{ $category->name }}">
                      <li><a href="#" onclick="fillValue('category', '')">All {{ str_plural($category->name) }}</a></li>
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
                <div data-min="{{ round($items->min('price')) }}" data-max="{{ round($items->max('price')) }}" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="{{ round($items->min('price')) }}" data-value-max="{{ round($items->max('price')) }}" data-label-result="Range:" id="minMaxPriceSlider">
                  <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                  <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                  <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                </div>
                <div class="range-price">Range: {{ round($items->min('price')) }} - {{ round($items->max('price')) }}</div>
              </div>
              <br>
              <div class="">
                <a href="#" class="btn essence-btn" onclick="fillValue('minPrice', $('.range-price')[0].innerHTML.match(/(\d+)/g)[0], 'maxPrice', $('.range-price')[0].innerHTML.match(/(\d+)/g)[1])">Filter By Price</a>
              </div>
              <br>
              <a href="#" class="font-weight-normal" onclick="fillValue('minPrice', '', 'maxPrice', '')">Clear Price Filter</a>
            </div>
          </div>

          {{-- <!-- ##### Single Widget ##### -->
          <div class="widget color mb-50">
            <!-- Widget Title 2 -->
            <p class="widget-title2 mb-30">Colour</p>
            <div class="widget-desc">
              <a href="#" class="font-weight-normal" onclick="fillValue('colour', '')">All Colours</a>
              <br>
              <br>
              <ul class="d-flex">
                @foreach ($colours as $key => $colour)
                  <li><a href="#" class="color{{ $key + 1 }}" title="{{ $colour->name }}" onclick="fillValue('colour', '{{ $colour->id }}')"></a></li>
                @endforeach
              </ul>
            </div>
          </div> --}}

          <!-- ##### Single Widget ##### -->
          <div class="widget brands mb-50">
            <!-- Widget Title 2 -->
            <a href="#" onclick="fillValue('brand', '')"><p class="widget-title2 mb-30">All Brands</p></a>
            <div class="widget-desc">
              <ul>
                @foreach ($brands as $brand)
                  <li><a href="#" onclick="fillValue('brand', '{{ $brand->id }}')" style="text-transform: none">{{ $brand->name }}</a></li>
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
                            <select name="select" id="sortByselect" onchange="fillValue('sort', $('#sortByselect').val())">
                              <option value="latest" onselect="fillValue('sort', 'latest')">Newest</option>
                              <option value="expensive" {{ $request->sort == "expensive"?'selected="selected"':''}}>Price: $$ - $</option>
                              <option value="cheap" {{ $request->sort == "cheap"?'selected="selected"':''}}>Price: $ - $$</option>
                            </select>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                @foreach ($items as $item)
                  <div class="col-12 col-sm-6 col-lg-4">
                      <div class="single-product-wrapper">
                          <!-- Product Image -->
                          <div class="product-img" style="height: 300px;">
                            @if ($request->path() != "order-requests")
                              <a href="/items/{{ $item->id }}">
                            @elseif ($request->path() == "order-requests")
                              <a href="/order-requests/{{ $item->id }}">
                            @endif
                              <img src="{{ $item->primary_image }}" alt="" style="height: 100%">
                              <!-- Hover Thumb -->
                              <img class="hover-img" src="{{ $item->secondary_image }}" alt="" style="height: 100%">
                            </a>

                            <!-- Product Badge -->
                            {{-- @if ($item->discount > 0)
                              <div class="product-badge offer-badge">
                                <span>-{{ floatval($item->discount) }}%</span>
                              </div>
                            @elseif ($item->new)
                              <div class="product-badge new-badge">
                                <span>New</span>
                              </div>
                            @endif --}}
                            @if ($item->hide)
                              <div class="product-badge offer-badge">
                                <span>Hidden</span>
                              </div>
                            @elseif ($item->new)
                              <div class="product-badge new-badge">
                                <span>New</span>
                              </div>
                            @endif

                            <!-- Favourite -->
                            {{-- <div class="product-favourite">
                              <a href="#" class="favme fa fa-heart"></a>
                            </div> --}}
                          </div>

                          <!-- Product Description -->
                          <div class="product-description">
                            <span style="text-transform: none">{{ $item->brand->name }}</span>
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
                              @if ($request->path() == "items/owner-shop")
                                <div class="add-to-cart-btn">
                                  <a href="/items/{{ $item->id }}/edit" class="btn essence-btn">Edit Item</a>
                                </div>
                              @elseif ($request->path() != "order-requests")
                                <div class="add-to-cart-btn">
                                  <a href="#" class="btn essence-btn" onclick="addToCart({{ $item->id }})">Add to Cart</a>
                                </div>
                              @endif
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
              <li class="page-item {{ ($items->currentPage() == 1)?"d-none":"" }}">
                <a class="page-link" href="{{ ($items->currentPage() != 1)?$items->previousPageUrl():"#" }}"><i class="fa fa-angle-left"></i></a>
              </li>
              @for ($page = 1; $page <= $items->lastPage(); $page++)
              <li class="page-item {{ ($items->currentPage() == $page)?"":"" }}">
                <a class="page-link" href="{{ $items->url($page) }}">{{ $page }}</a>
              </li>
              @endfor
              <li class="page-item {{ ($items->currentPage() == $items->lastPage())?"d-none":"" }}">
                <a class="page-link" href="{{ ($items->currentPage() != $items->lastPage())?$items->nextPageUrl():"#" }}"><i class="fa fa-angle-right"></i></a>
              </li>
            </ul>
          </nav>
      </div>
    </div>
  </div>
</section>
<!-- ##### Shop Grid Area End ##### -->

@push('scripts')
<script type="text/javascript">
  function fillValue(key, value, key2, value2) {
    if (key2)$('[name=' + key2 + ']').val(value2);
    $('[name=' + key + ']').val(value);
    if (key != 'minPrice') {
      $('[name=minPrice]').val('');
      $('[name=maxPrice]').val('');
    }
    $('#search-form').submit();
  }

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
@endpush