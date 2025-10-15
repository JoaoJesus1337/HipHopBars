@extends('welcome')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Artists</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($artists as $artist)
            <a href="{{ route('artists.show', $artist->slug) }}" class="block p-6 bg-white dark:bg-gray-800 rounded shadow hover:shadow-lg transition">
                <div class="text-xl font-semibold">{{ $artist->name }}</div>
            </a>
        @endforeach
    </div>
</div>
@endsection
