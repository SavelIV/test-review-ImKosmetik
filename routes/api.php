<?php

use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->group(function () {
    // Получить информацию о текущем пользователе
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Эндпоинты для управления избранным
Route::get('/favorite/', [FavoriteController::class, 'list']);
Route::get('/favorite/count/', [FavoriteController::class, 'count']);
Route::post('/favorite/{element}', [FavoriteController::class, 'add']);
Route::delete('/favorite/{element}', [FavoriteController::class, 'delete']);

// Эндпоинты для каталога
Route::get('/product/', [ProductController::class, 'list']);
