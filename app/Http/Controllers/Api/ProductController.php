<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\Models\Product;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\Api
 */
class ProductController extends Controller
{
    public function list(): Collection
    {
        return Product::all();
    }
}
