<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'thumbnail' => $faker->imageUrl(),
                'author' => $faker->name,
                'publisher' => $faker->company,
                'publication' => $faker->dateTime,
                'price' => $faker->randomFloat(2, 10, 100),
                'quantity' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 101)
            ]);
        }
    }
}
