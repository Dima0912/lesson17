<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->with('category')->inRandomOrder()->first();
        return view('products/index', compact('products'));
    }

    public function show(Product $product)
    {

    }
}
