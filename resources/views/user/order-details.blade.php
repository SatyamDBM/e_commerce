@include('header')

<div class="container py-5 text-light">
    <h2 class="mb-4">🧾 Order Details</h2>

    <!-- ===== Order Summary Card ===== -->
    <div class="card bg-dark text-light mb-4 shadow">
        <div class="card-body">
            <h5>
                Order Number: 
                <span class="text-success">{{ $order->order_number }}</span>
            </h5>
            <p>Date: {{ $order->created_at->format('d M Y, h:i A') }}</p>
            <p>
                Status: 
                <span class="badge 
                    @if($order->status === 'pending') bg-warning 
                    @elseif($order->status === 'completed') bg-success 
                    @elseif($order->status === 'cancelled') bg-danger 
                    @else bg-secondary 
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p>
                Payment Method: 
                <strong>{{ strtoupper($order->payment_method) }}</strong>
            </p>
            <p>
                Total Amount: 
                <strong class="text-success">
                    ₹{{ number_format($order->total_amount, 2) }}
                </strong>
            </p>
        </div>
    </div>

    <!-- ===== Order Items Table ===== -->
    <div class="table-responsive">
        <table class="table table-dark table-striped align-middle text-center">
            <thead class="table-success text-dark">
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @php $grandTotal = 0; @endphp

                @forelse($order->orderItems as $item)
                    @php 
                        $subtotal = $item->price * $item->quantity;
                        $grandTotal += $subtotal;
                    @endphp
                    <tr>
                        <td style="width: 100px;">
                            <img 
                                src="{{ asset('uploads/' . ($item->product->product_image ?? 'default.png')) }}" 
                                class="img-fluid rounded" 
                                alt="{{ $item->product->name ?? 'Product' }}"
                            >
                        </td>
                        <td>{{ $item->product->name ?? 'Unknown Product' }}</td>
                        <td>₹{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₹{{ number_format($subtotal, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <h5 class="text-warning">No items found in this order 😕</h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>

            <tfoot>
                <tr class="table-success text-dark fw-bold">
                    <td colspan="4" class="text-end">Total:</td>
                    <td>₹{{ number_format($grandTotal, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- ===== Action Buttons ===== -->
    <div class="mt-4 d-flex flex-column flex-md-row justify-content-end gap-2">
        <a href="{{ route('user.orders') }}" class="btn btn-outline-light w-100 w-md-auto">
            ← Back to Orders
        </a>
        <a href="/" class="btn btn-success w-100 w-md-auto">
            Continue Shopping
        </a>
    </div>
</div>

@include('footer')
