<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrocerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $groceries = [];

        for ($i = 0; $i < 50; $i++) {
            $groceries[] = [
                'name' => $faker->word(),
                'price' => $faker->randomFloat(2, 0.1, 100),
                'amount' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 9),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('groceries')->insert($groceries);
    }
}