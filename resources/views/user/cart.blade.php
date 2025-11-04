@include('header')
<div class="container py-5">
    <h2 class="text-center mb-4 text-light">🛒 Your Shopping Cart</h2>

    @if($cartItems->isEmpty())
        <div class="text-center text-light mt-5">
            <h4>Your cart is empty 😔</h4>
            <a href="/" class="btn btn-success mt-3">Continue Shopping</a>
        </div>
    @else
        <div class="table-responsive bg-dark p-4 rounded shadow">
            <table class="table table-dark table-striped align-middle text-center">
                <thead class="table-success text-dark">
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php 
                            $subtotal = $item->quantity * $item->product->offer_price;
                            $total += $subtotal;
                        @endphp
                        <tr data-id="{{ $item->id }}">
                            <td style="width: 100px;">
                                <img src="{{ asset('uploads/' . $item->product->product_image) }}" 
                                     class="img-fluid rounded" alt="{{ $item->product->name }}">
                            </td>
                            <td class="fw-semibold">{{ $item->product->name }}</td>
                            <td>₹{{ number_format($item->product->offer_price) }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-sm btn-outline-light qty-minus">−</button>
                                    <span class="mx-2 qty-value">{{ $item->quantity }}</span>
                                    <button class="btn btn-sm btn-outline-light qty-plus">+</button>
                                </div>
                            </td>
                            <td>₹{{ number_format($subtotal) }}</td>
                            <td>
<form action="{{ route('cart.remove', $item->id) }}" method="POST" class="delete-cart-item">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="bi bi-trash"></i>
    </button>
</form>



                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-success text-dark fw-bold">
                        <td colspan="4" class="text-end">Total:</td>
                        <td colspan="2">₹{{ number_format($total) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="text-end mt-4">
  <div class="d-flex flex-wrap justify-content-end gap-2">
    <a href="/" class="btn btn-outline-light flex-fill flex-md-grow-0">Continue Shopping</a>
    <a href="/checkout" class="btn btn-success flex-fill flex-md-grow-0">Proceed to Checkout</a>
  </div>
</div>

    @endif
</div>
@include('footer')