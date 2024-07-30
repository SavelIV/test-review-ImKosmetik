<?php

use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Auth\LoginRegisterController;
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

Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    // Получить информацию о текущем пользователе
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [LoginRegisterController::class, 'logout']);


// Эндпоинты для управления избранным
    Route::get('/favorite', [FavoriteController::class, 'list']);
    Route::post('/favorite/{element}', [FavoriteController::class, 'add']);
    Route::delete('/favorite/{element}', [FavoriteController::class, 'delete']);
});

// Эндпоинты для каталога
Route::get('/product', [ProductController::class, 'list']);
Route::get('/product/{product}', [ProductController::class, 'view']);
