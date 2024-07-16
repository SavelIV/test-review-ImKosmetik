<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class FavoriteController
 *
 * @package App\Http\Controllers\Api
 */
class FavoriteController extends Controller
{
    public function list(): Collection
    {
        return Favorite::all();
    }

    public function count(): int
    {
        return Favorite::count();
    }

    #[ArrayShape(['message' => "string"])] public function add(Request $request, int $elementId): array
    {
        $sessionId = Session::getId();
        $existingFavorite = Favorite::where('session_id', $sessionId)
            ->where('product_id', $elementId)
            ->first();

        if ($existingFavorite) {
            return ['message' => 'Element already in favorites.'];
        }

        Favorite::create([
            'session_id' => $sessionId,
            'product_id' => $elementId,
        ]);

        return ['message' => 'Element added to favorites.'];
    }

    #[ArrayShape(['message' => "string"])] public function delete(Request $request, int $elementId): array
    {
        $sessionId = Session::getId();
        $deleted = Favorite::where('session_id', $sessionId)
            ->where('product_id', $elementId)
            ->delete();

        if ($deleted) {
            return ['message' => 'Element deleted from favorites.'];
        } else {
            return ['message' => 'Element not found in favorites.'];
        }
    }
}
