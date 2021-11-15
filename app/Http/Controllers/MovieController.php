<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResourceCollection;
use Illuminate\Http\Request;
use App\Models\Movie;
//use App\Http\Resources\MovieResource;
use App\Http\Requests\StoreMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     //* @return \Illuminate\Http\Response
     */
    function index() {
        //return Movie::all()->toJson();
        return new MovieResourceCollection(Movie::all());
    }

    /**
     * Display a listing of the resource with childelements.
     *
     * @return \Illuminate\Http\Response
     */

    function allWithAvgRating() {
        //return Movie::withAvg('ratings', 'rating')->get()->toJson();
        return new MovieResourceCollection(Movie::withAvg('ratings', 'rating')->paginate(2));
    }
    function allRatings() {
        //return Movie::withAvg('ratings', 'rating')->get()->toJson();
        return new MovieResourceCollection(Movie::with('ratings')->get());
    }

    function showWithAvgRating($id = null) {
        return Movie::withAvg('ratings', 'rating')->get()->toJson();
    }

    function showWithRatings($id = null) {
        return Movie::withAvg('ratings', 'rating')->get()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->save();
        return response()->json([
            'message' => 'Movie is succesvol toegevoegd',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::withAvg('ratings', 'rating')->where('id',$id)->first()->toJson();
        //return new MovieResource(Movie::first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
