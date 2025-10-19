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
            'track_id' => \App\Models\Track::factory(),
            'lyrics' => $this->faker->paragraph(),
        ];
    }
}
