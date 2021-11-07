<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        return User::all()->toJson();
    }

    function withMovies() {
        return User::with('movies')->get()->toJson();
    }

    function byIdWithMovies($id) {
        return User::with('movies')->where('id', $id)->first()->toJson();
    }
}
