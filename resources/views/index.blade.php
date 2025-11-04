

@include('header')
<!-- Slider Section -->
<div id="cromaCarousel" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicators / Dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#cromaCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
    <button type="button" data-bs-target="#cromaCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#cromaCarousel" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#cromaCarousel" data-bs-slide-to="3"></button>
    <button type="button" data-bs-target="#cromaCarousel" data-bs-slide-to="4"></button>
  </div>

  <!-- Slides start-->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/slid1.webp') }}" class="d-block w-100" alt="Slide 1">
      
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slid2.webp') }}" class="d-block w-100" alt="Slide 2">
      
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slid3.webp') }}" class="d-block w-100" alt="Slide 3">
  
        
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slid4.webp') }}" class="d-block w-100" alt="Slide 4">
      
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/slid5.webp') }}" class="d-block w-100" alt="Slide 5">
      
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#cromaCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#cromaCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- slides end -->

 <!-- Category Slider Start -->
<div class="col-sm-12">
    <div class="col-sm-11 mx-auto">



<section class="category-slider py-3">
  <div class="container-fluid position-relative">
    <div class="d-flex justify-content-between align-items-center mb-3 px-4">
    </div>

    <!-- Left Arrow -->
    <button class="cat-scroll-btn left" id="catLeft">
      <i class="bi bi-chevron-left"></i>
    </button>

    <!-- Scrollable Category Container -->
    <div class="cat-slider-wrapper" id="catSlider">
      <div class="cat-item">
        <img src="{{ asset('img/t1.webp') }}" alt="Mobiles">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t2.webp') }}" alt="Televisions">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t3.webp') }}" alt="Air Conditioners">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t4.webp') }}" alt="Kitchen Appliances">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t5.webp') }}" alt="Laptops">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t6.webp') }}" alt="Headphones">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t7.webp') }}" alt="Water Purifiers">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t8.webp') }}" alt="Refrigerators">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t9.webp') }}" alt="Accessories">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t10.webp') }}" alt="Washing Machines">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t11.webp') }}" alt="Washing Machines">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t12.webp') }}" alt="Washing Machines">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t13.webp') }}" alt="Washing Machines">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t14.webp') }}" alt="Washing Machines">
      </div>
      <div class="cat-item">
        <img src="{{ asset('img/t15.webp') }}" alt="Washing Machines">
      </div>
      
      </div>
    </div>

    <!-- Right Arrow -->
    <button class="cat-scroll-btn right" id="catRight">
      <i class="bi bi-chevron-right"></i>
    </button>
  </div>
</section>
    </div>
</div>
<!-- Category Slider End -->


<!-- 🔹 Small Slider Start -->
<div class="col-sm-12">
    <div class="col-sm-10 mx-auto">
        <h2 class="text-light mt-5">Exciting Bank Offers For You</h2>
<section class="brand-strip py-4 pb-lg-5 ">
  <div class="scroll-container">
    <div class="scroll-content">
      <img src="{{ asset('img/m1.webp') }}" alt="m1">
      <img src="{{ asset('img/m2.png') }}" alt="m2">
      <img src="{{ asset('img/m3.webp') }}" alt="m3">
      <img src="{{ asset('img/m4.png') }}" alt="m4">
      <img src="{{ asset('img/m5.png') }}" alt="m5">
      <img src="{{ asset('img/m6.png') }}" alt="m6">
      <img src="{{ asset('img/m7.png') }}" alt="m7">
      <img src="{{ asset('img/m8.webp') }}" alt="m8">
      <img src="{{ asset('img/m9.webp') }}" alt="m9">
  

      <!-- duplicate for smooth infinite loop -->
      <img src="{{ asset('img/m1.webp') }}" alt="m1">
      <img src="{{ asset('img/m2.png') }}" alt="m2">
      <img src="{{ asset('img/m3.webp') }}" alt="m3">
      <img src="{{ asset('img/m4.png') }}" alt="m4">
    </div>
  </div>
</section>
    </div>
</div>
<!-- 🔹 Small Slider End -->

<!-- featured product start -->
<section class="products py-5 bg-dark">
  <div class="container">
    <h2 class="text-center fw-bold mb-5 text-light">Featured Products</h2>

    <div class="row g-3 justify-content-center">
      @foreach($featured as $item)
      <div class="col-lg-3 col-md-4 col-sm-6 col-6">
        <div class="product-card" data-product-id="{{ $item->id }}" >
          <div class="product-image">
            <img src="{{ asset('uploads/' . $item->product_image) }}" alt="{{ $item->name }}">
<a href="javascript:void(0)" data-product-id="{{$item->id}}" class="wishlist">
  <i class="bi bi-heart{{ Auth::check() && \App\Models\Wishlist::where('user_id', Auth::id())->where('product_id', $item->id)->exists() ? '-fill text-light-green' : '' }}"></i>
</a>
            <span class="discount">-{{ $item->discount_percent }}%</span>
          </div>
          <div class="product-content">
            <h6 class="product-name">{{ $item->name }}</h6>
            <p class="category">{{ $item->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <span class="old-price">₹{{ number_format($item->cross_price) }}</span>
                <span class="new-price">₹{{ number_format($item->offer_price) }}</span>
              </div>
              <button class="btn btn-sm btn-cart"><i class="bi bi-cart3"></i></button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- featured product end -->

<!-- latest launch start -->
 <div class="col-sm-12">
    <div class="col-sm-10 mx-auto"data-aos="fade-up" data-aos-duration="2000">
        <h2 class="text-light mt-5 pt-3 mb-4">Latest Launches</h2>
        <img src="{{asset('img/latest.webp')}}" alt="" style="border-radius: 10px;" width="100%">
    </div>
 </div>
<div class="col-sm-10 mx-auto mt-5 pb-5">
  <div class="row">
    <div class="col-6"data-aos="zoom-out-right" data-aos-duration="2000">
      <img src="{{ asset('img/latest1.webp') }}" alt="" style="border-radius: 10px; width: 100%;">
    </div>
    <div class="col-6"data-aos="zoom-out-right" data-aos-duration="2000">
      <img src="{{ asset('img/latest2.webp') }}" alt="" style="border-radius: 10px; width: 100%;">
    </div>
  </div>
</div>

<!-- latest launch end -->

<!-- new items start -->
 <section class="products py-5 bg-dark">
  <div class="container">
    <h2 class="text-center fw-bold mb-5 text-light">Trending & Premium items</h2>

   <div class="row g-3 justify-content-center">
  @foreach($products as $product)
  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
    <div class="product-card" data-product-id="{{$product->id}}">
      <div class="product-image">
        <img src="{{ asset('uploads/' . $product->product_image) }}" alt="{{ $product->name }}">
<section id="wishlistSection">
  <a href="javascript:void(0)" data-product-id="{{$product->id}}" class="wishlist">
    <i class="bi bi-heart{{ Auth::check() && \App\Models\Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->exists() ? '-fill text-light-green' : '' }}"></i>
  </a>
</section>



        <span class="discount">-{{ $product->discount_percent }}%</span>
      </div>
      <div class="product-content">
        <h6 class="product-name">{{ $product->name }}</h6>
        <p class="category">{{ $product->description }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <span class="old-price">₹{{ number_format($product->cross_price) }}</span>
            <span class="new-price">₹{{ number_format($product->offer_price) }}</span>
          </div>
          <button class="btn btn-sm btn-cart"><i class="bi bi-cart3"></i></button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

  </div>
</section>

<!-- new items end -->


<!-- iphone start -->
 <div class="col-sm-12">
    <div class="col-sm-10 mx-auto" data-aos="fade-up" data-aos-duration="2000">
        <h2 class="text-light mt-5 pt-5 mb-4 ">Watch Out For This</h2>
        <img src="{{asset('img/iphone.webp')}}" alt="" width="100%" style="border-radius: 10px;">
    </div>
 </div>
 <div class="col-sm-10 mx-auto mt-5">
  <div class="row">
    <div class="col-6 " data-aos="zoom-out-right" data-aos-duration="2000">
      <img src="{{ asset('img/iphone1.webp') }}" alt="" style="border-radius: 10px; width: 100%;">
    </div>
    <div class="col-6 " data-aos="zoom-out-right" data-aos-duration="2000">
      <img src="{{ asset('img/iphone2.webp') }}" alt="" style="border-radius: 10px; width: 100%;">
    </div>
  </div>
</div>
<!-- iphone end -->


<!-- recycle start -->
 <div class="col-sm-12" >
    <div class="col-sm-10 mx-auto mb-5" data-aos="fade-up" data-aos-duration="2000">
        <h2 class="text-light mt-5 pt-4">Easy e-waste recycling with Croma</h2>
        <img src="{{asset('img/recycle1.webp')}}" alt="" width="100%" style="border-radius: 10px;">
    </div>
 </div>
<!-- recycle end -->
@include('footer')

