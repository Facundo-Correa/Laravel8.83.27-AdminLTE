<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoCan extends Model
{
    use HasFactory;

    protected $table = 'catalogo_can';

    protected $fillable = [
        'calendario_nro_control', 'can_codigo', 'can_numero', 'can_nombre', 'can_nacimiento', 'can_nombrep',
        'can_nombrem', 'can_tatuaje', 'datcodusuario', 'can_nombrecriador', 'can_expositor', 'agrupacion',
        'sexo', 'categoria', 'edad', 'catalogo_nro', 'seleccionado', 'padre_seleccionado', 'madre_seleccionada',
        'cab2', 'placa_dcf', 'placa_codo', 'dependencias', 'calendario_fecha_letras', 'pruebas_adiestramiento',
        'guia', 'seleccion', 'delegacion', 'peludo', 'libre', 'librenosocio', 'librefueradezona'
    ];
}
