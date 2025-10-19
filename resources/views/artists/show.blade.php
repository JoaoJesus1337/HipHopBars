@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <a href="{{ route('artists.index') }}" class="inline-block mb-4 text-sm text-white hover:text-gray-800">&larr; Back</a>

    <header class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-100">{{ $artist->name }}</h1>
        <p class="text-sm text-gray-300 font-bold">{{ $rhymes->count() }} Rhymes</p>
    </header>

    <!-- Album filter -->
    <div class="mb-4 flex items-center gap-3">
        <label for="albumFilter" class="sr-only">Filter by album</label>
        <input list="albumsList" id="albumFilter" placeholder="Filter by album (type to search)" class="w-full max-w-md bg-gray-700 text-gray-100 placeholder-gray-400 rounded-full pl-4 pr-10 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        <button id="clearAlbumFilter" type="button" class="-ml-10 w-9 h-9 rounded-full bg-gray-600 hover:bg-gray-500 text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-label="Clear filter">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 8.586L15.95 2.636a1 1 0 111.414 1.414L11.414 10l5.95 5.95a1 1 0 11-1.414 1.414L10 11.414l-5.95 5.95a1 1 0 01-1.414-1.414L8.586 10 2.636 4.05a1 1 0 011.414-1.414L10 8.586z" clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Clear filter</span>
        </button>
        <datalist id="albumsList">
            @foreach($artist->albums ?? [] as $album)
                <option value="{{ $album->title }}"></option>
            @endforeach
        </datalist>
    </div>

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
                    <tr data-album-title="{{ optional($rhyme->track->album)->title }}">
                        <td class="p-3 align-middle">
                            <div class="flex flex-col items-center justify-center">
                                @if(optional($rhyme->track->album)->image)
                                    <img src="{{ asset('storage/' . $rhyme->track->album->image) }}" alt="{{ optional($rhyme->track->album)->title }}" class="w-24 h-24 object-cover rounded mx-auto" />
                                @else
                                    <div class="w-24 h-24 bg-gray-100 rounded flex items-center justify-center text-xs text-gray-400">No image</div>
                                @endif

                                <div class="mt-2 text-xs text-gray-300 text-center font-bold">{{ optional($rhyme->track->album)->title }}</div>
                            </div>
                        </td>
                        <td class="p-3">
                            <div class="text-sm text-white whitespace-pre-wrap font-bold font">{{ $rhyme->lyrics }}</div>
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

<script>
document.addEventListener('DOMContentLoaded', function(){
    const input = document.getElementById('albumFilter');
    const clearBtn = document.getElementById('clearAlbumFilter');
    const rows = Array.from(document.querySelectorAll('tbody tr[data-album-title]'));

    function applyFilter() {
        const val = input.value.trim().toLowerCase();
        if(!val) {
            rows.forEach(r => r.style.display = 'table-row');
            return;
        }

        rows.forEach(r => {
            const title = (r.dataset.albumTitle || '').toLowerCase();
            if(title.includes(val)) r.style.display = 'table-row'; else r.style.display = 'none';
        });
    }

    input.addEventListener('input', applyFilter);
    clearBtn.addEventListener('click', function(){ input.value = ''; applyFilter(); });
});
</script>
</div>
@endsection
