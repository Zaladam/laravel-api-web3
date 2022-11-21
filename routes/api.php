<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;
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

Route::post("/users/signup", [UserContoller::class,"store"]);
Route::get("/users", [UserContoller::class,"index"]);
Route::get("/users/{id}", [UserContoller::class,"show"]);
Route::put("/users/{id}", [UserContoller::class,"update"]);
Route::delete("/users/{id}", [UserContoller::class,"destroy"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
