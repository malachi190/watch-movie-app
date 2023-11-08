@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16 flex flex-1 justify-normal gap-10 flex-col">
        <div class="popular-movies border-b border-gray-800 pb-8">
            <h2 class="uppercase tracking-wider text-orange-500 md:text-2xl font-semibold text-xl">Popular Movies <span><i
                        class="fa-solid fa-star"></i></span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ($popularMovies as $popularMovie)
                    <div class="mt-8">
                        <a href="{{ route('movies.show', [$popularMovie['id']]) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $popularMovie['poster_path'] }}"
                                alt="{{ $popularMovie['title'] }}"
                                class="hover:opacity-75 transition ease-in-out duration-75">
                            <div class="mt-3">
                                <a href="{{ route('movies.show', [$popularMovie['id']]) }}"
                                    class="text-base mt-2 hover:text-gray-300 text-center">
                                    {{ $popularMovie['title'] }}
                                </a>
                                <div class="flex items-center text-gray-400 mt-3 text-sm">
                                    <span><i class="fa-solid fa-star text-orange-500"></i></span>
                                    <span class="ml-2">{{ $popularMovie['vote_average'] * 10 . '%' }}</span>
                                    <span class="mx-2">|</span>
                                    <span>{{ \Carbon\Carbon::parse($popularMovie['release_date'])->format('M d, Y') }}</span>
                                </div>
                                <div class="text-gray-400 ">
                                    <p class="text-sm font-semibold">
                                        @foreach ($popularMovie['genre_ids'] as $genre)
                                            {{ $genres->get($genre) }}@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="showing-movies">
            <h2 class="uppercase tracking-wider text-orange-500 md:text-2xl font-semibold text-xl">Now Playing <span><i
                        class="fa-solid fa-film"></i></span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ($nowPlaying as $movie)
                    <div class="mt-8">
                        <a href="{{ route('movies.show', [$movie['id']]) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}"
                                alt="{{ $movie['title'] }}">
                            <div class="mt-3">
                                <a href="{{ route('movies.show', [$movie['id']]) }}"
                                    class="text-base mt-2 hover:text-gray-300 text-center">{{ $movie['title'] }}</a>
                                <div class="flex items-center text-gray-400 mt-3 text-sm">
                                    <span><i class="fa-solid fa-star text-orange-500"></i></span>
                                    <span class="ml-2">{{ $movie['vote_average'] * 10 . '%' }}</span>
                                    <span class="mx-2">|</span>
                                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                                </div>
                                <div class="text-gray-400 ">
                                    <p class="text-sm font-semibold">
                                        @foreach ($movie['genre_ids'] as $genre)
                                            {{ $genres->get($genre) }}@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
