@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16 flex flex-1 justify-normal gap-10 flex-col">
        <div class="popular-movies border-b border-gray-800 pb-8">
            <h2 class="uppercase tracking-wider text-orange-500 md:text-2xl font-semibold text-xl">Showing Today</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ($airing_today as $show)
                    <div class="mt-8">
                        <a href="{{route('shows.tvshow', $show['id'])}}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $show['poster_path'] }}"
                                alt="{{ $show['name'] }}" class="hover:opacity-75 transition ease-in-out duration-75">
                            <div class="mt-3">
                                <a href="{{route('shows.tvshow', $show['id'])}}" class="text-base mt-2 hover:text-gray-300 text-center">
                                    {{ $show['name'] }}
                                </a>
                                <div class="flex items-center text-gray-400 mt-3 text-sm">
                                    <span><i class="fa-solid fa-star text-orange-500"></i></span>
                                    <span class="ml-2">{{ $show['vote_average'] * 10 . '%' }}</span>
                                    <span class="mx-2">|</span>
                                    <span>{{ \Carbon\Carbon::parse($show['first_air_date'])->format('M d, Y') }}</span>
                                </div>
                                <div class="text-gray-400 ">
                                    <p class="text-sm font-semibold">
                                        @foreach ($show['genre_ids'] as $genre)
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

        <div class="popular-movies border-b border-gray-800 pb-8">
            <h2 class="uppercase tracking-wider text-orange-500 md:text-2xl font-semibold text-xl">Popular </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ($popular as $show)
                    <div class="mt-8">
                        <a href="{{route('shows.tvshow', $show['id'])}}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $show['poster_path'] }}"
                                alt="{{ $show['name'] }}" class="hover:opacity-75 transition ease-in-out duration-75">
                            <div class="mt-3">
                                <a href="{{route('shows.tvshow', $show['id'])}}" class="text-base mt-2 hover:text-gray-300 text-center">
                                    {{ $show['name'] }}
                                </a>
                                <div class="flex items-center text-gray-400 mt-3 text-sm">
                                    <span><i class="fa-solid fa-star text-orange-500"></i></span>
                                    <span class="ml-2">{{ $show['vote_average'] * 10 . '%' }}</span>
                                    <span class="mx-2">|</span>
                                    <span>{{ \Carbon\Carbon::parse($show['first_air_date'])->format('M d, Y') }}</span>
                                </div>
                                <div class="text-gray-400 ">
                                    <p class="text-sm font-semibold">
                                        @foreach ($show['genre_ids'] as $genre)
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

        <div class="popular-movies border-b border-gray-800 pb-8">
            <h2 class="uppercase tracking-wider text-orange-500 md:text-2xl font-semibold text-xl">Top Rated </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ($top_rated as $show)
                    <div class="mt-8">
                        <a href="{{route('shows.tvshow', $show['id'])}}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $show['poster_path'] }}"
                                alt="{{ $show['name'] }}" class="hover:opacity-75 transition ease-in-out duration-75">
                            <div class="mt-3">
                                <a href="{{route('shows.tvshow', $show['id'])}}" class="text-base mt-2 hover:text-gray-300 text-center">
                                    {{ $show['name'] }}
                                </a>
                                <div class="flex items-center text-gray-400 mt-3 text-sm">
                                    <span><i class="fa-solid fa-star text-orange-500"></i></span>
                                    <span class="ml-2">{{ $show['vote_average'] * 10 . '%' }}</span>
                                    <span class="mx-2">|</span>
                                    <span>{{ \Carbon\Carbon::parse($show['first_air_date'])->format('M d, Y') }}</span>
                                </div>
                                <div class="text-gray-400 ">
                                    <p class="text-sm font-semibold">
                                        @foreach ($show['genre_ids'] as $genre)
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
