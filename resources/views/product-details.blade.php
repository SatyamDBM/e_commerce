@include('header')

<div class="container py-5 text-light">

  <!-- Product Section -->
  <div class="row g-5 align-items-start">
    
    <!-- 🖼️ Product Image -->
    <div class="col-lg-5 col-md-6">
      <div class="card bg-dark border-0 shadow-sm rounded-4 overflow-hidden">
        <img id="mainImage" 
             src="{{ asset('uploads/' . $product->product_image) }}" 
             class="img-fluid w-100" 
             alt="{{ $product->name }}">
      </div>
    </div>

    <!-- 🛒 Product Details -->
    <div class="col-lg-7 col-md-6">
      <h2 class="fw-bold mb-3">{{ $product->name }}</h2>

      <!-- Rating -->
      <div class="d-flex align-items-center mb-3">
        <div class="text-warning fs-5">★★★★☆</div>
        <small class="text-secondary ms-2">(145 Reviews)</small>
      </div>

      <!-- Description -->
      <p class="text-secondary mb-4">{{ $product->description }}</p>

      <!-- Pricing -->
      <div class="mb-4">
        <span class="text-decoration-line-through text-secondary me-2 fs-5">
          ₹{{ number_format($product->cross_price) }}
        </span>
        <span class="fs-2 fw-bold text-success">
          ₹{{ number_format($product->offer_price) }}
        </span>
        <span class="badge bg-danger ms-2 fs-6">-{{ $product->discount_percent }}%</span>
      </div>

      <!-- Quantity Selector -->
      <div class="d-flex align-items-center mb-4">
        <label class="me-3 fw-semibold" for="quantity">Quantity:</label>
        <div class="d-flex align-items-center border border-secondary rounded-pill px-3 py-1">
          <button class="btn btn-sm text-light" id="decreaseQty">−</button>
          <input type="text" id="quantity" value="1" 
                 class="form-control text-center bg-dark text-light border-0 mx-2" 
                 style="width:50px;">
          <button class="btn btn-sm text-light" id="increaseQty">+</button>
        </div>
      </div>

      <!-- Buttons -->
      <div class="d-flex gap-3 flex-wrap">
        <button class="btn btn-success btn-lg px-4 shadow-sm" id="addToCartBtn" 
                data-product-id="{{ $product->id }}">
          <i class="bi bi-cart3 me-2"></i> Add to Cart
        </button>

        <a href="/cart" class="btn btn-outline-light btn-lg px-4">
          <i class="bi bi-bag-check me-2"></i> View Cart
        </a>
      </div>

      <!-- Delivery Info -->
      <div class="mt-5 border-top border-secondary pt-4">
        <h6 class="fw-bold text-light">Delivery Information</h6>
        <p class="text-secondary mb-0">Usually delivered within 
          <strong>3–5 business days</strong> across India.</p>
        <small class="text-muted">Free delivery on orders above ₹999</small>
      </div>
    </div>
  </div>

  <!-- 🧩 Related Products -->
  <hr class="my-5 border-secondary">
  <h3 class="fw-bold mb-4 text-center">You May Also Like</h3>

  <div class="row g-3 justify-content-center">
    @foreach(\App\Models\Product::where('id', '!=', $product->id)->take(4)->get() as $related)
      <div class="col-lg-3 col-md-4 col-sm-6 col-6">
        <div class="card bg-dark border-0 shadow-sm product-card h-100 small-card" data-product-id="{{ $related->id }}">
          <div class="ratio ratio-1x1 overflow-hidden">
            <img src="{{ asset('uploads/' . $related->product_image) }}" 
                 class="card-img-top object-fit-cover" 
                 alt="{{ $related->name }}">
          </div>
          <div class="card-body text-center py-3">
            <h6 class="fw-semibold text-light text-truncate">{{ $related->name }}</h6>
            <p class="text-success fw-semibold mb-2 small">₹{{ number_format($related->offer_price) }}</p>
            <a href="{{ url('/product/' . $related->id) }}" class="btn btn-outline-light btn-sm px-3 py-1">
              View
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

</div>

@include('footer')
