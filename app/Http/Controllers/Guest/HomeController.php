<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videogame;

class HomeController extends Controller
{
    public function index()
    {
        $videogames = Videogame::where('available', '1')->get();

        return view('home', compact('videogames'));
    }
}