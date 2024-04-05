<?php

use App\Http\Controllers\Api\TaskController;
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

// Эндпоинты для управления тасками
Route::get('/task/', [TaskController::class, 'sortArray']);
Route::get('/task/count/{array}', [TaskController::class, 'calcSize']);
Route::post('/task/{element}', [TaskController::class, 'addElements']);
Route::post('/task/{element}', [TaskController::class, 'remove_element']);
