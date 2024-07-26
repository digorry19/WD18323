<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $genres = Genre::all();

        for ($i = 1; $i <= 50; $i++) {
            Movie::create([
                'title' => "Movie Title $i",
                'poster' => "https://i1-giaitri.vnecdn.net/2024/07/17/ke-trom-1721181866-3368-1721181994.jpg?w=240&h=144&q=100&dpr=1&fit=crop&s=mZBp4-O0leGZUF6TDWOM9w",
                'intro' => "This is the introduction for movie $i.",
                'release_date' => now()->subDays(rand(0, 365))->toDateString(),
                'genre_id' => $genres->random()->id,
            ]);
        }
    }
}