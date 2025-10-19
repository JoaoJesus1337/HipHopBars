@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-gray-100 text-3xl font-bold mb-2">Artists</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($artists as $artist)
            <a href="{{ route('artists.show', $artist) }}" class="block p-6 bg-gray-800 rounded shadow hover:shadow-lg transition">
                @if($artist->image)
                    <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="mb-3 w-full h-32 object-cover rounded" />
                @endif
                <div class="text-xl font-semibold text-gray-100">{{ $artist->name }}</div>
            </a>
        @endforeach
    </div>
</div>
@endsection
