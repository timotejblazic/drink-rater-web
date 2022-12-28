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

    public function rate(Cocktail $drink, Request $request) {
        // Check if user has already rated this drink and return error message if so
        if($drink->ratings()->where('user_id', auth()->user()->id)->exists()) {
            return redirect()->back()->with('alreadyExists', 'You have already rated this drink!');
        }

        // Validate input data
        $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $drink->ratings()->create([
            'rating' => $request->rating,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }
}
