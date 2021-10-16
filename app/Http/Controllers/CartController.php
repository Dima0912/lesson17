<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Product $product) 
    {
        return view('cart/view');
    }

    public function add(Product $product)
    {

    }

    public function delete(Product $product)
    {

    }

    public function contUpdate(Product $product)
    {

    }
}
