<?php

use App\Models\Artist;
use App\Models\Rhyme;
use Illuminate\Testing\Fluent\AssertableJson;

it('shows artists grid and artist page', function () {
    $artist = Artist::factory()->create(['name' => 'Test Artist', 'slug' => 'test-artist']);
    $rhyme = Rhyme::factory()->create(['artist_id' => $artist->id, 'title' => 'Best Rhyme', 'lyrics' => 'Yo yo', 'rank' => 100]);

    $this->get(route('artists.index'))->assertStatus(200)->assertSee('Test Artist');
    $this->get(route('artists.show', $artist->slug))->assertStatus(200)->assertSee('Best Rhyme')->assertSee('Yo yo');
});
