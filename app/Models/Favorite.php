<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cocktail() {
        return $this->belongsTo(Cocktail::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
