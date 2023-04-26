<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebasDeAdiestramiento extends Model
{
    use HasFactory;
    
    protected $table = 'pruebas_de_adiestramiento';

    protected $fillable = [
        'prueba_codigo', 'descripcion'
    ];
}
