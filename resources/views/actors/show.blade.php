@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] }}" class="w-fit">

        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold">
                {{ $actor['name'] }}
            </h2>

            <div class="flex items-center text-gray-400 text-sm mt-3">
                <span><i class="fa-solid fa-cake-candles"></i></span>
                <span class="mx-3">{{ \Carbon\Carbon::parse($actor['birthday'])->format('M d, Y') }}
                    ({{ \Carbon\Carbon::parse($actor['birthday'])->age }} years old)</span>
                <span class="mx-2">|</span>
                <span>{{ $actor['place_of_birth'] }}</span>
            </div>

            <p class="mt-8 text-base text-gray-500">
                {{ $actor['biography'] }}
            </p>

            <div class="mt-5 flex flex-col gap-2">
                <h2 class="text-xl font-semibold">Known For</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                    @foreach ($movies as $movie)
                        <div class="mt-3 flex flex-col">
                            <img src="{{ $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w300/' . $movie['poster_path'] : 'https://via.placeholder.com/185x278' }}"
                                alt="" class="w-fit">
                            <p class="mt-2 text-gray-300 text-lg text-start truncate">
                                {{ $movie['title'] }}
                            </p>
                            <small
                                class="text-sm">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
