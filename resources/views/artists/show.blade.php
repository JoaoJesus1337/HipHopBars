@extends('welcome')

@section('content')
<div class="container mx-auto p-6">
    <a href="{{ route('artists.index') }}" class="text-sm text-blue-600">&larr; Back</a>
    <h1 class="text-3xl font-bold my-4">{{ $artist->name }}</h1>

    <div class="space-y-4">
        @foreach($rhymes as $rhyme)
            <div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="font-semibold">{{ $rhyme->title }}</div>
                        <div class="text-sm text-gray-500">{{ optional($rhyme->album)->title }}</div>
                    </div>
                    <div class="text-sm text-gray-400">Rank: {{ $rhyme->rank }}</div>
                </div>
                <pre class="mt-3 whitespace-pre-wrap">{{ $rhyme->lyrics }}</pre>
            </div>
        @endforeach
    </div>
</div>
@endsection
