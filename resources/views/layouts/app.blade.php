<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'HipHopBars') }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="min-h-screen flex flex-col">
        <header class="bg-gray-800 shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <a href="{{ route('artists.index') }}" class="inline-flex items-center">
                            <div class="h-12 w-12 rounded-full overflow-hidden bg-white flex items-center justify-center">
                                <img src="{{ asset('storage/logo.png') }}" alt="{{ config('app.name', 'HipHopBars') }}" class="h-10 w-10 object-cover" />
                            </div>
                    </a>
                </div>

                <form method="GET" action="{{ route('artists.index') }}" class="w-full max-w-md">
                    <label for="search" class="sr-only">Search artists</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <!-- search icon -->
                            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </div>

                        <input id="search" type="search" name="q" value="{{ request('q') }}" placeholder="Search artists..." class="block w-full bg-gray-700 text-gray-100 placeholder-gray-400 rounded-full pl-10 pr-12 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-0" />

                        <button type="submit" class="absolute right-0 top-0 bottom-0 m-1 inline-flex items-center justify-center px-4 rounded-full bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 text-white text-sm shadow"> 
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>
