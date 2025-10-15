<?php

declare(strict_types=1);

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

final class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::query()->orderBy('name')->get();

        return view('artists.index', compact('artists'));
    }

    public function show(Artist $artist)
    {
        $rhymes = $artist->rhymes()->with('album')->orderByDesc('rank')->take(10)->get();

        return view('artists.show', compact('artist', 'rhymes'));
    }
}
