<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->paginate(10);

        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin/products/new', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $fields = $request->validated();
        $category = Category::find($fields['category']);
        
        $images = !empty($fields['images']) ? $fields['images'] : [];
        unset($fields['category']);
        unset($fields['images']);

        $product = $category->products()->create($fields);

    }
}
