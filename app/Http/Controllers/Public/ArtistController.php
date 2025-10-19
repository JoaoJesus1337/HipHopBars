<?php

declare(strict_types=1);

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

final class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q');

        $artistsQuery = Artist::query();

        if ($query) {
            $artistsQuery->where('name', 'like', "%{$query}%");
        }

        $artists = $artistsQuery->orderBy('name')->get();

        return view('artists.index', compact('artists'));
    }

    public function show(Artist $artist)
    {
        $rhymes = $artist->rhymes()->with(['track.album'])->take(10)->get();

        return view('artists.show', compact('artist', 'rhymes'));
    }
}
