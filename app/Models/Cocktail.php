<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'instructions',
        'image',
        'avgRating',
        'user_id'
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function ingredients() {
        return $this->belongsToMany(Ingredient::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}