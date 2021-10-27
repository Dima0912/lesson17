<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\CategoriesController;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
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

    public function test_store()
    {
        
$categories = Category::query()->create()->first();
$route = route('admin.categories');
$response = $this->post($route);
    }
}
