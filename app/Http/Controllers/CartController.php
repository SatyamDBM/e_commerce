<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $user_id = Auth::id();

        $cartItem = Cart::where('product_id', $id)
                        ->where('user_id', $user_id)
                        ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
            $status = 'updated';
        } else {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $id,
                'quantity' => 1
            ]);
            $status = 'added';
        }

        $cartItems = Cart::with('product')
                        ->where('user_id', $user_id)
                        ->get();

        $html = view('user.cart', compact('cartItems'))->render();

        return response()->json([
            'status' => $status,
            'html' => $html,
            'message' => 'Cart updated successfully!'
        ]);
    }

    public function showCart()
    {
        $user_id = Auth::id();
        $cartItems = Cart::with('product')
                        ->where('user_id', $user_id)
                        ->get();

        return view('user.cart', compact('cartItems'));
    }
    public function updateQuantity(Request $request, $id)
{
    $cart = Cart::findOrFail($id);
    $cart->update(['quantity' => $request->quantity]);
    return response()->json(['status' => 'success']);
}

public function remove($id)
{
    $cartItem = \App\Models\Cart::find($id);

    if ($cartItem) {
        $cartItem->delete();
        return response()->json(['status' => 'success']);
    }

    return response()->json(['status' => 'error']);
}



    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Your cart is empty!');
        }

        $total = $cartItems->sum(fn($item) => $item->quantity * $item->product->offer_price);

        return view('user/checkout', compact('cartItems', 'total'));
    }

    public function confirmOrder(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Your cart is empty!');
        }

        $total = $cartItems->sum(fn($item) => $item->quantity * $item->product->offer_price);

        // ✅ Create Order
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'total_amount' => $total,
            'payment_method' => 'COD',
            'status' => 'pending',
        ]);

        // ✅ Create Order Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->offer_price,
            ]);
        }

        // ✅ Clear cart after order placed
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('user.dashboard')->with('success', 'Order placed successfully!');
    }
}
