@extends('layouts.main')

@section('content')
    <div class="container mx-auto">
        <div class="movie-info border-b border-gray-800">
            <div class="container mx-auto px-4 py-10 flex justify-center items-center flex-col md:flex-row gap-6">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $series['poster_path'] }}" alt="{{ $series['name'] }}"
                    class="w-3/4">
                <div class="md:ml-24">
                    <h2 class="text-4xl font-semibold">
                        {{ $series['name'] }}
                    </h2>
                    <div class="mt-3 mb-5">
                        <p class="text-lg text-gray-400">
                            {{ $series['overview'] }}
                        </p>
                    </div>

                    <div class="flex items-center text-gray-400 text-sm">
                        <span><i class="fa-solid fa-star text-orange-500"></i></span>
                        <span class="ml-2">{{ $series['vote_average'] * 10 . '%' }}</span>
                        <span class="mx-2">|</span>
                        <span>last aired {{ \Carbon\Carbon::parse($series['last_air_date'])->format('M d, Y') }}</span>
                        <span class="mx-2">|</span>
                        <p class="text-sm font-semibold">
                            @foreach ($series['genres'] as $genre)
                                {{ $genre['name'] }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                        <span class="mx-2">|</span>
                        <p class="text-sm font-semibold">
                            @foreach ($series['seasons'] as $season)
                                {{ $season['name'] }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </div>

                    <div class="mt-12">
                        <h2 class="text-white font-semibold">Network</h2>

                        <div class="flex mt-4 gap-5">
                            @foreach ($series['networks'] as $network)
                                <div class="mr-8 flex gap-5 items-center">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w200/' . $network['logo_path'] }}"
                                        alt="{{ $network['name'] }}" class="w-1/4">
                                    <p>{{ $network['name'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-12">
                        <h2 class="text-white font-semibold">Created By</h2>

                        <div class="flex mt-4 gap-5">
                            @foreach ($series['created_by'] as $crew)
                                <div class="mr-8">
                                    <p>{{ $crew['name'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if (count($series['videos']['results']) > 0)
                        <div class="mt-12">
                            <a href="https://youtube.com/watch?v={{ $series['videos']['results'][0]['key'] }}"
                                class="inline-flex items-center justify-center bg-orange-500 text-gray-900 font-semibold text-base px-5 py-3 hover:bg-orange-800 hover:text-white transition ease-in duration-75 gap-2">
                                <i class="fa-solid fa-play"></i>
                                <span class="mx-1"> Play Trailer</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="movie-casts border-b border-gray-800">
                <div class="container mx-auto py-16 px-4">
                    <h2 class="text-4xl font-semibold">
                        Cast
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                        @foreach ($series['credits']['cast'] as $cast)
                            @if ($loop->index < 10)
                                <div class="mt-8">
                                    <a href="{{ route('actors.show', $cast['id']) }}">
                                        <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}"
                                            alt="" class="w-3/4">
                                    </a>
                                    <a href="{{ route('actors.show', $cast['id']) }}">
                                        <p class="text-lg text-gray-300 py-3">{{ $cast['name'] }}</p>
                                    </a>

                                    <p class="text-sm text-gray-400">{{ $cast['character'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="movie-casts border-b border-gray-800">
                <div class="container mx-auto py-16 px-4">
                    <h2 class="text-4xl font-semibold">
                        Images
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                        @foreach ($series['images']['backdrops'] as $image)
                            @if ($loop->index < 10)
                                <div class="mt-8">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $image['file_path'] }}"
                                        alt="" class="w-3/4">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
