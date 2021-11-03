<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\CategoriesController;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_create()
    {
       $response = $this->get('admin.categories.new');
       $response->assertStatus(404);
    }

    public function test_store()
    {

        $category = Category::factory(1)->create();
        $response = $this->get('admin.categories');
        $response->assertStatus(404);
      
    }

}
