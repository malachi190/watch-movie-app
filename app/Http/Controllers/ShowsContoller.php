<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function Ramsey\Uuid\v1;

class ShowsContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airing_today = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/airing_today')->json()['results'];
        $popular = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/popular')->json()['results'];
        $top_rated = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/top_rated')->json()['results'];
        $genreArr = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];

        $genres = collect($genreArr)->mapWithKeys(function ($genre) {
            return [
                $genre['id'] => $genre['name']
            ];
        });

        return view('tvshows.index', [
            'airing_today' => collect($airing_today)->take(10),
            'popular' => $popular,
            'top_rated' => $top_rated,
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $series = Http::withToken(config('services.tmdb.token'))->get("https://api.themoviedb.org/3/tv/" . $id . '?append_to_response=credits,videos,images')->json();

        // dump($series);
        return view('tvshows.show', [
            'series' => $series
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
