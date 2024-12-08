<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Game extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_game_id'; // Đặt cột khóa chính đúng
    public $incrementing = true; // Nếu khóa chính là auto-increment
    protected $keyType = 'int'; // Nếu khóa chính là kiểu số

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }

}
