@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <a href="{{ route('artists.index') }}" class="inline-block mb-4 text-sm text-gray-600 hover:text-gray-800">&larr; Back</a>

    <header class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-100">{{ $artist->name }}</h1>
        <p class="text-sm text-gray-300">{{ $rhymes->count() }} Rhymes</p>
    </header>

    <div class="bg-gray-800 shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-800">
                <tr>
                    <th class="w-24 p-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Album</th>
                    <th class="p-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rhyme</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach($rhymes as $rhyme)
                    <tr>
                        <td class="p-3 align-middle">
                            <div class="flex flex-col items-center justify-center">
                                @if(optional($rhyme->track->album)->image)
                                    <img src="{{ asset('storage/' . $rhyme->track->album->image) }}" alt="{{ optional($rhyme->track->album)->title }}" class="w-24 h-24 object-cover rounded mx-auto" />
                                @else
                                    <div class="w-24 h-24 bg-gray-100 rounded flex items-center justify-center text-xs text-gray-400">No image</div>
                                @endif

                                <div class="mt-2 text-xs text-gray-300 text-center">{{ optional($rhyme->track->album)->title }}</div>
                            </div>
                        </td>
                        <td class="p-3">
                            <div class="text-sm text-white whitespace-pre-wrap">{{ $rhyme->lyrics }}</div>
                        </td>
                        <td colspan="2" class="p-2 divide-gray-700">
                            <div class="text-sm text-gray-300 text-center">Track: <span class="font-medium text-gray-100">{{ optional($rhyme->track)->name }}</span></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
