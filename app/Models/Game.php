<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $primaryKey = 'game_id';
    public $incrementing = true; // Nếu khóa chính là auto-increment
    protected $keyType = 'int'; // Nếu khóa chính là kiểu số
    
    protected $fillable = [
        'name',
        'imagePath',
        'gamePath',
        'category_id',
        'description',        
    ];

    public function user_games() {
        return $this->hasMany(User_Game::class);
    }

    public function controls() {
        return $this->hasMany(Control::class, 'game_id', 'game_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user__games', 'game_id', 'user_id');
    }

}
