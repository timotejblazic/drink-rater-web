<?php

use App\Http\Controllers\CocktailController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Models\Cocktail;
use Illuminate\Http\Request;

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
Route::get('/drinks/orderBy', [CocktailController::class, 'orderBy'])->name('drinksOrderBy');

Route::get('/drink/{drink}', [CocktailController::class, 'show'])->name('drink');
Route::post('/drink/{drink}/comment', [CommentController::class, 'store'])->middleware('verified');
Route::post('/drink/{drink}/rate', [CocktailController::class, 'rate'])->middleware('verified');
Route::post('/drink/{drink}/favorite', [CocktailController::class, 'favorite'])->middleware('verified');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

require __DIR__.'/auth.php';
