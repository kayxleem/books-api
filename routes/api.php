<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ExternalBookController;
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

Route::prefix('v1')->group(function ($route) {
    $route->resource('books', BookController::class);
    $route->delete('/books/{book}/delete',[BookController::class,'destroy']);
});

Route::get('/',[BookController::class,'index']);

Route::get('/external-books',ExternalBookController::class);

