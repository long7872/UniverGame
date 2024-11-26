<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    public function control_type() {
        return $this->belongsTo(Control_Type::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }

}
