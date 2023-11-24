<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        return view('ingredient', [
            'ingredients' => Ingredient::all(),
        ]);
    }

    public function add()
    {
        // Validate input data
        request()->validate([
            'name' => 'required'
        ]);

        Ingredient::create([
            'name' => request()->name
        ]);

        return redirect()->back();
    }
}
