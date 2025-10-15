<?php

namespace Database\Factories;

use App\Models\Rhyme;
use App\Models\Artist;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class RhymeFactory extends Factory
{
    protected $model = Rhyme::class;

    public function definition(): array
    {
        return [
            'artist_id' => Artist::factory(),
            'album_id' => Album::factory(),
            'title' => $this->faker->sentence(4),
            'lyrics' => $this->faker->paragraph(),
            'rank' => $this->faker->numberBetween(1, 100),
        ];
    }
}
