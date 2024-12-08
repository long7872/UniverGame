<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_Type extends Model
{
    use HasFactory;

    protected $table = 'control__types';

    protected $primaryKey = 'control_type_id';
    public $incrementing = true; // Nếu khóa chính là auto-increment
    protected $keyType = 'int'; // Nếu khóa chính là kiểu số

    public function control() {
        return $this->hasMany(Control::class);
    }

}
