<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create()->each(function ($category) {
            $products = Product::factory(4, ['category_id' => $category->id])->create()->each(function ($product) {
                ProductImage::factory(rand(2, 5), ['product_id' => $product->id])->create();
            });
        });
    }
}
