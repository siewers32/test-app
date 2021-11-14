<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('movies', MovieController::class);
//Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies-with-ratings', [MovieController::class, 'allWithAvgRating']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users-with-movies', [UserController::class, 'withMovies']);
Route::get('/user-with-movies/{id}', [UserController::class, 'byIdwithMovies']);


Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login']);
