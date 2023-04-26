<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senias extends Model
{
    use HasFactory;
    
    protected $table = 'senias';

    protected $fillable = [
        'senia_cod', 'senia_descripcion',
    ];
}
