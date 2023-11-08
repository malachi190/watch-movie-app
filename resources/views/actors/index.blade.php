@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 md:text-2xl font-semibold text-xl">Popular Actors <span><i
                        class="fa-solid fa-star"></i></span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                @foreach ($popularActors as $actor)
                    @if ($loop->index <= 9)
                        <div class="mt-8">
                            <a href="{{route('actors.show', $actor['id'])}}">
                                <img src={{ 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] }} alt=""
                                    class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{route('actors.show', $actor['id'])}}" class="text-lg hover:text-gray-400">
                                    {{ $actor['name'] }}
                                </a>
                                <p class="truncate text-sm text-gray-300">
                                    @foreach ($actor['known_for'] as $movie)
                                        @if ($movie['media_type'] == 'movie')
                                            {{ $movie['title'] . ', ' }}
                                        @elseif ($movie['media_type'] == 'tv')
                                            {{ $movie['name'] . ', ' }}
                                        @endif
                                    @endforeach
                                </p>


                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="mt-5 p-4 flex justify-between">
                @if ($prev)
                    <a href="/actors/page/{{ $prev }}"
                        class="bg-orange-500 text-white px-5 py-2 rounded text-sm">Prev</a>
                @else
                    <div></div>
                @endif
                @if ($next)
                    <a href="/actors/page/{{ $next }}"
                        class="bg-orange-500 text-white px-5 py-2 rounded text-sm">Next</a>
                @else
                    <div></div>
                @endif


            </div>
        </div>
    </div>
@endsection
