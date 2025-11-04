<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function myOrders()
{
    $orders = \App\Models\Order::with('orderItems.product')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('user.orders', compact('orders'));
}

public function show($id)
{
$order = Order::with('orderItems.product')->findOrFail($id);

    if ($order->user_id !== Auth::id()) {
        abort(403);
    }

    return view('user.order-details', compact('order'));
}

}
