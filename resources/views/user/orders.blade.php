@include('header')
<div class="container py-5 text-light">
    <h2 class="mb-4">📦 My Orders</h2>

    @if($orders->isEmpty())
        <div class="text-center">
            <h4>No orders found 😔</h4>
            <a href="/" class="btn btn-success mt-3">Start Shopping</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-dark table-striped align-middle text-center">
                <thead class="table-success text-dark">
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                           <td>₹{{ number_format($order->total_amount, 2) }}</td>
                            <td><span class="badge bg-info">{{ ucfirst($order->status) }}</span></td>
                            <td>
                                <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-sm btn-outline-light">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@include('footer')
