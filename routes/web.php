<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies-with-ratings', [MovieController::class, 'withRatings']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users-with-movies', [UserController::class, 'withMovies']);
Route::get('/user-with-movies/{id}', [UserController::class, 'byIdwithMovies']);
