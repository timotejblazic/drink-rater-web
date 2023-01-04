<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    public function top4() {
        return view('home', [
            'drinks' => Cocktail::orderBy('avgRating', 'desc')->take(4)->get()
        ]);
    }

    public function index() {
        $drinks = Cocktail::all()->filter(
            // Filter out drink that matches query string and checked i (ingredients)
            function($drink) {
                if(!request()->has('q') && !request()->has('i')) {
                    return true;
                }

                if(request()->has('q') && !request()->has('i')) {
                    return str_contains(strtolower($drink->name), strtolower(request()->q));
                }

                if(!request()->has('q') && request()->has('i')) {
                    $ingredients = request()->i;
                    $drinkIngredients = $drink->ingredients->pluck('id')->toArray();

                    foreach($ingredients as $ingredient) {
                        if(!in_array($ingredient, $drinkIngredients)) {
                            return false;
                        }
                    }

                    return true;
                }

                if(request()->has('q') && request()->has('i')) {
                    $ingredients = request()->i;
                    $drinkIngredients = $drink->ingredients->pluck('id')->toArray();

                    foreach($ingredients as $ingredient) {
                        if(!in_array($ingredient, $drinkIngredients)) {
                            return false;
                        }
                    }

                    return str_contains(strtolower($drink->name), strtolower(request()->q));
                }
            }
        );

        // Check if orderBy query string is set and order drinks accordingly
        if (request()->has('o')) {
            $orderBy = request()->o;

            switch($orderBy) {
                case 'rating':
                    $drinks = $drinks->sortByDesc('avgRating');
                    break;
                case '_rating':
                    $drinks = $drinks->sortBy('avgRating');
                    break;
                case 'name':
                    $drinks = $drinks->sortByDesc('name');
                    break;
                case '_name':
                    $drinks = $drinks->sortBy('name');
                    break;
                default:
                    break;
            }
        }


        return view('drinks', [
            'drinks' => $drinks,
            'ingredients' => Ingredient::all()
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
}
