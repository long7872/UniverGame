<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function user_games() {
        return $this->hasMany(User_Game::class);
    }

    public function controls() {
        return $this->hasMany(Control::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
