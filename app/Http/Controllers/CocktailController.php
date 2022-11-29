<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function top4() {
        return view('home', [
            // 'drinks' => Cocktail::orderBy('rating', 'desc')->take(4)->get()
            'drinks' => Cocktail::all()->take(4)
        ]);
    }

    public function index() {
        return view('drinks', [
            'drinks' => Cocktail::all()
        ]);
    }

    public function show(Cocktail $drink) {
        return view('drink', [
            'drink' => $drink
        ]);
    }
}
