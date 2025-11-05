<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

 public function addToWishlist($id)
 {
    if (!Auth::check()) {
        return response()->json(['error' => 'not_logged_in']);
    }

    $user_id = Auth::id();
    $product_id = $id;

    $exists = Wishlist::where('user_id', $user_id)
                      ->where('product_id', $product_id)
                      ->exists();

    if ($exists) {
        Wishlist::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->delete();

        return response()->json(['status' => 'removed']);
    } else {
        Wishlist::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);

        return response()->json(['status' => 'added']);
    }
 }



 public function myWishlist()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->get();
        return view('user.wishlist', compact('wishlist'));
    }
}
