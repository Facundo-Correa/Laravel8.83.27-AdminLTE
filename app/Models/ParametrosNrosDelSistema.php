<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametrosNrosDelSistema extends Model
{
    use HasFactory;
    
    protected $table = 'parametros_nros_del_sistema';

    protected $fillable = [
        'param_codigo', 'param_descripcion', 'param_valor_inicial', 'param_ultimo_valor'
    ];
}
