<?php

namespace App\Http\Controllers;

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

    public function show(int $id)
    {
       
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
}
