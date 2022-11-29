<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Cocktail $drink) {
        // Validation

        
        $drink->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        return back();
    }
}
