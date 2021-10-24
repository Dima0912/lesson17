<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
      $categories = Category::query()->withCount('products')->get();

      return view('admin/categories/index', compact('categories'));
    }

    public function create()
    {
      
        return view('admin.categories.new');
    }

    public function store(CreateCategoryRequest $request)
    {
      if(Category::query()->create($request->validated())) return redirect()->route('admin.categories')->with('status', 'Категория создана');
    }

    public function edit(Category $category)
    {
      return view('admin.categories.edit', compact('category'));
    }

   

    public function update(UpdateCategoryRequest $request, Category $category)
    {
      if($category->update($request->validated())) return redirect()->route('admin.categories')->with('status', 'Категория обновлена');
    }

    public function destroy(Category $category) {

      $category->delete();
      return redirect()->back()->with('status', 'Категория успешно удалена');

    }
}
