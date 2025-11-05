@extends('admin.layout')

@section('title', 'Orders')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">📦 Orders</h3>

    <div class="table-responsive shadow-lg rounded">
        <table class="table table-dark table-striped text-center">
            <thead class="table-success text-dark">
                <tr>
                    <th>ID</th>
                    <th>Order No</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->user->name ?? 'Unknown' }}</td>
                        <td>₹{{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
