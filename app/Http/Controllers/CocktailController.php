<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function top4() {
        return view('home', [
            'drinks' => Cocktail::orderBy('avgRating', 'desc')->take(4)->get()
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

    public function favorite(Cocktail $drink) {
        // Check if user has already favorited this drink and remove it from favorites if so
        if($drink->favorites()->where('user_id', auth()->user()->id)->exists()) {
            $drink->favorites()->where('user_id', auth()->user()->id)->delete();
            return redirect()->back();
        }

        $drink->favorites()->create([
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }

    public function orderBy(Request $request) {
        $orderBy = $request->o;

        if($orderBy == 'rating') {
            return view('drinks', [
                'drinks' => Cocktail::orderBy('avgRating', 'desc')->get()
            ]);
        } else if($orderBy == '_rating') {
            return view('drinks', [
                'drinks' => Cocktail::orderBy('avgRating', 'asc')->get()
            ]);
        } else if($orderBy == 'name') {
            return view('drinks', [
                'drinks' => Cocktail::orderBy('name', 'desc')->get()
            ]);
        } else if($orderBy == '_name') {
            return view('drinks', [
                'drinks' => Cocktail::orderBy('name', 'asc')->get()
            ]);
        } else {
            return view('drinks', [
                'drinks' => Cocktail::all()
            ]);
        }
    }
}
