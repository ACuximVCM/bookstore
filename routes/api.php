<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/numero-al-azar', fn (Request $request) => ['random_number' => rand($request->get('min'), $request->get('max'))]);

Route::apiResource('reservations', ReservationController::class);
Route::get('eloquent-example', [ReservationController::class, 'listEloquent']);

Route::get('/authors-list', [AuthorController::class,'index']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::delete('/author/{id}', [AuthorController::class, 'destroy']);

Route::get('/book', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::delete('book/{id}', [BookController::class, 'destroy']);