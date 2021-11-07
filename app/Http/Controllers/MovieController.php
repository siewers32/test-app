<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    function index() {
        return Movie::all()->toJson();
    }

    function withRatings($id = null) {
        return Movie::withAvg('ratings', 'rating')->toJson();
    }
}
