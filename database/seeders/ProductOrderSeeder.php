<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use DB;

class ProductOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('product_order')->insert(
                [
                    'order_id' => \App\Models\Order::factory()->create()->id,
                    'product_id' => \App\Models\Product::factory()->create()->id,
                    'qty' => 1,
                ]
            );
        }
    }
}
