<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FavoriteController
 *
 * @package App\Http\Controllers\Api
 */
class FavoriteController extends Controller
{
    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function list(int $userId): JsonResponse
    {
        if ($user = User::find($userId)) {
            return response()->json($user->favoriteProducts()->get());
        }
    }

    /**
     * @param Request $request
     * @param int $elementId
     * @param int $userId
     * @return JsonResponse|false
     */
    public function add(Request $request, int $elementId, int $userId): JsonResponse|false
    {
        if ($user = User::find($userId)) {
            if ($user->favoriteProducts()->pluck('products.id')->contains($elementId)) {
                $message = 'Element already in favorites.';
            } else {
                $user->favoriteProducts()->attach($elementId);
                $message = 'Element added to favorites.';
            }

            return response()->json(['data' => $user->favoriteProducts()->get(), 'message' => $message]);
        }
    }

    /**
     * @param Request $request
     * @param int $elementId
     * @param int $userId
     * @return JsonResponse|false
     */
    public function delete(Request $request, int $elementId, int $userId): JsonResponse|false
    {
        if ($user = User::find($userId)) {
            if ($user->favoriteProducts()->pluck('products.id')->contains($elementId)) {
                $user->favoriteProducts()->detach($elementId);
                $message = 'Element deleted from favorites.';
            } else {
                $message = 'Element not found in favorites.';
            }
        }
        return response()->json(['data' => $user->favoriteProducts()->get(), 'message' => $message]);
    }
}
