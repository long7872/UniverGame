<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id'; // Đặt cột khóa chính đúng
    public $incrementing = true; // Nếu khóa chính là auto-increment
    protected $keyType = 'int'; // Nếu khóa chính là kiểu số

    public function games() {
        return $this->hasMany(Game::class, 'category_id');
    }

}
