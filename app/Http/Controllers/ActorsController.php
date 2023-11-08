<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page = 1)
    {
        $popularActors = Http::withToken(config('services.tmdb.token'))->get("https://api.themoviedb.org/3/person/popular?page=" . $page)->json()['results'];

        $prev = $page > 1 ? $page - 1 : null;
        $next = $page < 500 ? $page + 1 : null;

        return view('actors.index', [
            'popularActors' => collect($popularActors),
            'prev' => $prev,
            'next' => $next
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
        $actor = Http::withToken(config('services.tmdb.token'))->get("https://api.themoviedb.org/3/person/".$id)->json();
        $credits = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')->json();

        $cast = collect($credits)->get('cast');
        $movies = collect($cast)->where('media_type', 'movie')->sortBy('popularity')->take(5);

        return view('actors.show', [
            'actor' => $actor,
            'movies' => $movies
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
