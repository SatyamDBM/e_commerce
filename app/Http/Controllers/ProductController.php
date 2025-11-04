<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showForm()
    {
        return view('add-product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cross_price' => 'required|numeric',
            'offer_price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $filename = time().'.'.$request->product_image->getClientOriginalExtension();
        $request->product_image->move(public_path('uploads'), $filename);

        Product::create([
    'name' => $request->name,
    'description' => $request->description,
    'cross_price' => $request->cross_price,
    'offer_price' => $request->offer_price,
    'discount_percent' => $request->discount_percent,
    'product_image' => $filename,
]);


        return back()->with('success', '✅ Product uploaded successfully!');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product-details', compact('product'));
    }
public function liveSearch(Request $request)
{
    $query = $request->get('query');

    if (!$query) {
        return response()->json([]);
    }

    $results = \App\Models\Product::where('name', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->take(6)
        ->get(['id', 'name']);

    // ✅ Always return an array
    return response()->json($results->toArray());
}



}
