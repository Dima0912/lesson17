<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $product = Product::paginate(10);
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_create()
    {
        $categories = Category::make();
        $response = $this->get('admin/products/new');
        $response->assertStatus(302);
    }
    public function test_store()
    {
        $response = $this->get('admin/products');
        $response->assertStatus(302);
    }
}
