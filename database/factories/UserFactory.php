<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Faker\Generator\e164PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = Role::where(
            'name',
            '=',
            Config::get('constants.db.roles.customer')
        )->first();
       
        return [
            
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName,
            'birthdate' => $this->faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
            'role_id' => $role->id,
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => $this->faker->password(8),
            'remember_token' => Str::random(10),
        ];
        
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
      
        return $this->state(function (array $attributes) {
            
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
