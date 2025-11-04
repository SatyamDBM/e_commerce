@include('header')

<section class="products py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5 text-light">My Wishlist</h2>

        @if($wishlist->count() > 0)
            <div class="row g-3 justify-content-center">
                @foreach($wishlist as $item)
                    @if($item->product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="product-card" data-product-id="{{ $item->product->id }}">
                                <div class="product-image">
                                    <img 
                                        src="{{ asset('uploads/' . $item->product->product_image) }}" 
                                        alt="{{ $item->product->name }}"
                                    >
                                    <a 
                                        href="javascript:void(0)" 
                                        data-product-id="{{ $item->product->id }}" 
                                        class="wishlist"
                                    >
                                        <i class="bi bi-heart-fill text-light-green"></i>
                                    </a>
                                    <span class="discount">
                                        -{{ $item->product->discount_percent }}%
                                    </span>
                                </div>

                                <div class="product-content">
                                    <h6 class="product-name">{{ $item->product->name }}</h6>
                                    <p class="category">{{ $item->product->description }}</p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="old-price">
                                                ₹{{ number_format($item->product->cross_price) }}
                                            </span>
                                            <span class="new-price">
                                                ₹{{ number_format($item->product->offer_price) }}
                                            </span>
                                        </div>

                                        <button class="btn btn-sm btn-cart">
                                            <i class="bi bi-cart3"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="text-center text-light mt-5">
                <i class="bi bi-heart fs-1 mt-5"></i>
                <h5 class="mt-5">Your wishlist is 🚫 empty</h5>
                <a href="{{ route('index') }}" class="btn btn-success mt-5">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</section>

@include('footer')
