<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class FavoriteController
 *
 * @package App\Http\Controllers\Api
 */
class FavoriteController extends Controller
{
    /**
     * @return JsonResponse|false
     */
    public function list(): JsonResponse|false
    {
        if ($user = Auth::user()) {
            return response()->json($user->favoriteProducts()->get());
        }

        return false;
    }

    /**
     * @param Request $request
     * @param int $elementId
     * @return JsonResponse|false
     */
    public function add(Request $request, int $elementId): JsonResponse|false
    {
        if ($user = Auth::user()) {
            if ($user->favoriteProducts()->pluck('products.id')->contains($elementId)) {
                $message = 'Element already in favorites.';
            } else {
                $user->favoriteProducts()->attach($elementId);
                $message = 'Element added to favorites.';
            }

            return response()->json(['data' => $user->favoriteProducts()->get(), 'message' => $message]);
        }

        return false;
    }

    /**
     * @param Request $request
     * @param int $elementId
     * @return JsonResponse|false
     */
    public function delete(Request $request, int $elementId): JsonResponse|false
    {
        if ($user = Auth::user()) {
            if ($user->favoriteProducts()->pluck('products.id')->contains($elementId)) {
                $user->favoriteProducts()->detach($elementId);
                $message = 'Element deleted from favorites.';
            } else {
                $message = 'Element not found in favorites.';
            }

            return response()->json(['data' => $user->favoriteProducts()->get(), 'message' => $message]);
        }

        return false;
    }
}
