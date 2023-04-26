<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenesCodigos extends Model
{
    use HasFactory;
    
    protected $table = 'examenes_codigos';

    protected $fillable = [
        'examen_cod', 'examen_desc', 'examen_nivel'
    ];
}
