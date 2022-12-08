<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\AuthorController;
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

Route::apiResource('/comics',ComicController::class);
Route::apiResource('/distributors',DistributorController::class);
Route::apiResource('/authors',AuthorController::class);



// Route::resource('/authors', AuthorController::class)->only(['index', 'show']);