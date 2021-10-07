<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate table
        User::truncate();
        Product::truncate();
        Order::truncate();
        Tag::truncate();
        \DB::table('product_order')->truncate();
        \DB::table('tag_user')->truncate();

        //User::factory(10)->create();

        // api restaurant
        $path = config_path().'/restaurant-api.json';
        $json = file_get_contents($path);
        $items = json_decode($json);

        // Class Faker
        $faker = Factory::create();

        // Items Tag
        $tags = ['Panineria', 'Pizzeria', 'Fast Food', 'Gelateria', 'pastificio'];

        // Tag
        foreach($tags as $tag){
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = \Str::slug($tag);

            $newTag->save();
        }

        // User
        foreach($items->restaurantItems as $restaurant){
            $user = new User();
            $user->name = $restaurant->name;
            $user->slug = \Str::slug($restaurant->name);
            $user->email = $faker->unique()->safeEmail();
            $user->email_verified_at = now();
            $user->password = \Hash::make('password'); // password
            $user->address = $faker->streetName;
            $user->house_number = $faker->buildingNumber;
            $user->postal_code = 90100;
            $user->country = 'Italia';
            $user->phone_number = '3458294002';
            $user->description = $faker->text($maxNbChars = 200);
            $user->cover = $restaurant->cover;
            $user->vat_number = \Str::random(10);
            $user->city = 'Palermo';
            $user->remember_token = \Str::random(10);

            $user->save();

            // Pivot tag_user
            //$user->tags()->attach( Tag::all()->random()->id );
            $user->tags()->attach( $restaurant->tag );

            // Product
            foreach($restaurant->products as $product){
                $newProduct = new Product();
                $newProduct->user_id = $user->id;
                $newProduct->name = $product->title;
                $newProduct->description = $faker->text($maxNbChars = 200);
                $newProduct->img_path = $product->image;
                $newProduct->ingredient = $faker->text($maxNbChars = 5);
                $newProduct->visibility = 1;
                $newProduct->price = rand(1,12);
                $newProduct->slug = \Str::slug($product->title);
                
                $newProduct->save();

                // Order
                for($i = 0; $i < 2; $i++){
                    $order = new Order();
                    $order->user_id = $user->id;
                    $order->name = $faker->name();
                    $order->lastname = $faker->name();
                    $order->email = $faker->unique()->safeEmail();
                    $order->price = $newProduct->price;
                    $order->address = $faker->streetName;
                    $order->house_number = $faker->buildingNumber;
                    $order->postal_code = '90100';
                    $order->country = 'Italia';
                    $order->phone_number = '3276549756';
                    $order->city = 'Palermo';

                    $order->save();

                    // Pivot product_order
                    $order->products()->attach($newProduct->id, ['qty' => rand(1,4)]);
                }
            }
        }
    }
}
