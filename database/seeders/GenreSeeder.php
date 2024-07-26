<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            ['name' => 'Action'],
            ['name' => 'Martial Arts'],
            ['name' => 'Drama'],
            ['name' => 'Fantasy'],
            ['name' => 'Horror'],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
