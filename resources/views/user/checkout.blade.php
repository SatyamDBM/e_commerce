@include('header')

<div class="container py-5 text-light">
    <h2 class="text-center fw-bold mb-5" data-aos="fade-down">🛒 Checkout</h2>

    <div class="card bg-dark text-light shadow-lg rounded-4 p-4" data-aos="fade-up">
        <h4 class="fw-semibold mb-4 border-bottom pb-2 text-success">Your Order Summary</h4>

        @if($cartItems->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark align-middle text-center">
                    <thead class="table-success text-dark">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <img 
                                        src="{{ asset('uploads/' . $item->product->product_image) }}"
                                        alt="{{ $item->product->name }}"
                                        class="img-fluid rounded shadow-sm"
                                        style="width: 70px; height: 70px; object-fit: cover;"
                                    >
                                </td>
                                <td class="fw-semibold">{{ $item->product->name }}</td>
                                <td>₹{{ number_format($item->product->offer_price) }}</td>
                                <td>x{{ $item->quantity }}</td>
                                <td class="text-success fw-semibold">
                                    ₹{{ number_format($item->quantity * $item->product->offer_price) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                <h5 class="fw-bold mb-0">Total Amount:</h5>
                <h4 class="text-success fw-bold mb-0">₹{{ number_format($total) }}</h4>
            </div>

            <form action="{{ route('checkout.confirm') }}" method="POST" class="mt-5 text-end">
                @csrf
                <button type="submit" class="btn btn-success btn-lg px-5 py-2 fw-semibold shadow">
                    <i class="bi bi-bag-check-fill me-2"></i>Confirm Order (COD)
                </button>
            </form>
        @else
            <div class="text-center my-5">
                <i class="bi bi-cart-x fs-1 text-danger"></i>
                <h5 class="mt-3">Your cart is empty 😕</h5>
                <a href="{{ route('index') }}" class="btn btn-success mt-3">Continue Shopping</a>
            </div>
        @endif
    </div>
</div>

@include('footer')
