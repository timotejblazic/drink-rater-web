<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function cocktails() {
        return $this->belongsToMany(Cocktail::class);
    }
}
