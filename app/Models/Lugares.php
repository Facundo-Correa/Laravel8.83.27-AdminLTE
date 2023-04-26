<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugares extends Model
{
    use HasFactory;
    
    protected $table = 'lugares';

    protected $fillable = [
        'lugar_cod', 'lugar_desc'
    ];
}
