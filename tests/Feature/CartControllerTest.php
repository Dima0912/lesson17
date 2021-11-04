<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected function setUpVariables()
    {
        $this->category = Category::factory(1)->create()->first();
        $this->product = Product::factory(1, ['category_id' => $this->category->id])->create()->first();
    }


   public function test_index()
   {
       $responce = $this->get('cart/index');

       $responce->assertStatus(404);
   }
}
