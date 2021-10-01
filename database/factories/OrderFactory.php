<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->name(),
            'lastname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'price' => 10, //Str::random(10),
            'address' => $this->faker->streetName,
            'house_number' => $this->faker->buildingNumber,
            'postal_code' => '10000', //$this->faker->postcode,
            'country' => 'Italia', //$this->faker->country,
            'phone_number' => '3458294002', //$this->faker->phoneNumber,
            'city' => 'Palermo', //$this->faker->city(),
        ];
    }
}
