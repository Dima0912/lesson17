<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
      $categories = Category::query()->withCount('products')->get();
    }

    public function create()
    {
        return view('admin.categories.new', compact('categories'));
    }

    public function store(Category $category, Request $request)
    {
    }

    public function edit(Category $category)
    {
    }

   

    public function update(Category $category, Request $request)
    {
    }
}
