<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\Contracts\ProductImagesServiceInterface;
use App\Services\ImageService;
use App\Services\ProductImagesService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin/products/new', compact('categories'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all(['id', 'name'])->toArray();

        return view('admin/products/edit', compact('product', 'categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $fields = $request->validated();
        $images = !empty($fields['images']) ? $fields['images'] : [];
        $category = Category::find($fields['category']);


        $product = $category->products()->create($fields);
        ProductImagesService::attach ($product, $images);
      
        return redirect()->route('admin/products');
   }

   public function update(UpdateProductRequest $request, Product $product) 
   {

   }
}
