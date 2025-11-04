<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Latest ya sabhi products fetch karo
        $products = Product::take(8)->get(); // Pehle section ke liye 8 products
        $featured = Product::skip(8)->take(8)->get(); // Next 8 featured section ke liye

        return view('index', compact('products', 'featured'));
    }
}
