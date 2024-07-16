<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('index', []);
    }
}
