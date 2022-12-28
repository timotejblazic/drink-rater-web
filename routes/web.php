<?php

use App\Http\Controllers\CocktailController;
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

Route::get('/', [CocktailController::class, 'top4'])->name('home');

Route::get('/drinks', [CocktailController::class, 'index'])->name('drinks');

Route::get('/drink/{drink}', [CocktailController::class, 'show']);

Route::post('/drink/{drink}/comment', [CommentController::class, 'store']);

Route::post('/drink/{drink}/rate', [CocktailController::class, 'rate']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
