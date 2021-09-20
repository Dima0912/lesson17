<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{


    public function index()
    {
        $products = Category::query()->limit(10)->with('category')->inRandomOrder()->get();
        $categories = Product::query()->limit(4)->inRandomOrder()->get();

        return view('home', compact('categories', 'products'));
    }
}
