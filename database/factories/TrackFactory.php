<?php

namespace Database\Factories;

use App\Models\Track;
use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    protected $model = Track::class;

    public function definition(): array
    {
        return [
            'album_id' => Album::factory(),
            'name' => $this->faker->sentence(3),
        ];
    }
}
