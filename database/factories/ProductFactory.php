<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nameProduct = $this->faker->name;
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $nameProduct,
            'description' => $this->faker->text($maxNbChars = 30),
            'img_path' => $this->faker->imageUrl($width = 640, $height = 480),
            'ingredient' => $this->faker->name,
            'visibility' => 1,
            'price' => 10,
            'slug' => Str::slug($nameProduct),
        ];
    }
}
