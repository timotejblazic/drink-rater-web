<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Models\Cocktail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        // 'drinks' => Cocktail::orderBy('rating', 'desc')->take(4)->get()
        'drinks' => Cocktail::all()
    ]);
});

Route::get('/drinks', function() {
    return view('drinks', [
        'drinks' => Cocktail::all()
    ]);
});

Route::get('/drink/{drink}', function($id) {
    return view('drink', [
        'drink' => Cocktail::find($id)
    ]);
});

Route::post('/drink/{drink}/comment', [CommentController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
