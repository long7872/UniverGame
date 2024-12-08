<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $table = 'controls';

    protected $primaryKey = 'control_id'; // Đặt cột khóa chính đúng
    public $incrementing = true; // Nếu khóa chính là auto-increment
    protected $keyType = 'int'; // Nếu khóa chính là kiểu số

    public function controlType() {
        return $this->belongsTo(Control_Type::class, 'control_type_id', 'control_type_id');
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }

}
