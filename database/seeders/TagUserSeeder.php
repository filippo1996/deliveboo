<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use DB;

class TagUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('tag_user')->insert(
                [
                    'tag_id' => \App\Models\Tag::factory()->create()->id,
                    'user_id' => \App\Models\User::factory()->create()->id,
                ]
            );
        }
    }
}
