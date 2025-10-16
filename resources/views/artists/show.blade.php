@extends('welcome')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <a href="{{ route('artists.index') }}" class="inline-block mb-4 text-sm text-gray-600 hover:text-gray-800">&larr; Back</a>

    <header class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-white">{{ $artist->name }}</h1>
        <p class="text-sm text-gray-500">{{ $rhymes->count() }} Rhymes</p>
    </header>

    <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="w-24 p-3 text-left text-xs font-medium text-black uppercase tracking-wider">Album</th>
                    <th class="p-3 text-left text-xs font-medium text-black uppercase tracking-wider">Rhyme</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($rhymes as $rhyme)
                    <tr>
                        <td class="p-3 align-top">
                            @if(optional($rhyme->album)->image)
                                <img src="{{ asset('storage/' . $rhyme->album->image) }}" alt="{{ optional($rhyme->album)->title }}" class="w-20 h-20 object-cover rounded" />
                            @else
                                <div class="w-20 h-20 bg-gray-100 rounded flex items-center justify-center text-xs text-gray-400">No image</div>
                            @endif
                            <div class="mt-2 text-xs text-white">{{ optional($rhyme->album)->title }}</div>
                        </td>
                        <td class="p-3">
                            <div class="text-sm text-white whitespace-pre-wrap">{{ $rhyme->lyrics }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
