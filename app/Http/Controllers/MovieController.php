<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * Es como GET (o READ?)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "hello";
        $movies = Movie::get();
        echo json_encode($movies);
       
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     * Debe crear un nuevo elemento con los parámetros recibidos.
     * Es lo mismo que POST
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    echo "Hi from store";
    //     print_r($request->all());

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->genre = $request->input('genre');
        $movie->year = $request->input('year');
        $movie->duration = $request->input('duration');
        $movie->save();
        echo json_encode($movie);
    }
    

    // /**
    //  * Display the specified resource.
    //  * Muestra los registros tal cual en una página,
    //  * no interesa por ahora porque index hace lo mismo pero
    //  * en formato JSON.
    //  *
    //  * @param  \App\Movie  $movie
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Movie $movie)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Movie  $movie
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Movie $movie)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     * 
     * Es lo mismo que PUT (edit)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $movie_id)
    {
        //echo "Hi from update";

        $movie = Movie::find($movie_id);
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->genre = $request->input('genre');
        $movie->year = $request->input('year');
        $movie->duration = $request->input('duration');
        $movie->save();
        echo json_encode($movie);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * Esto es DELETE
     *
     * @param  \App\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)
    {
        // echo "Hi from destroy";
        $movie = Movie::find($movie_id);
        $movie->delete();
        $movies = Movie::get();
        echo json_encode($movies);

    }
}
