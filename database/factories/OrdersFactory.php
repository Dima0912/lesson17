<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $this->addProducts();
        });
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::query()->inRandomOrder()->first();
        $status = OrderStatus::query()->inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'status_id' => $status->id,
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
            'country' => substr($this->faker->country, 0, 50),
            'city' => $this->faker->city,
            'adress' => $this->faker->address,
            'total' => $this->faker->randomFloat()
        ];
    }

    public function addProducts(Order $order)
    {
        $numder = rand(1, 4);
        $ids = [];
        for ($i = 0; $i < $numder; $i++) {
            $product = Product::query()->whereNotIn('id', $ids)->inRandomOrder()->first();
            $ids[] = $product->id;
            $quantity = rand(1, 3);

            $order->products()->newPivat([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'single_price' => $product->price
            ]);
        }
    }
}
