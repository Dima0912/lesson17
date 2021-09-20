<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Routing\Controller;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::query()->with('category')->paginate(10);
       return view('products/index', compact('products'));
    }

    public function show(Product $product)
    {
return view('products/show', compact('product'));
    }
}
