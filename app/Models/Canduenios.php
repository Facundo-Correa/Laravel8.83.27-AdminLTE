<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canduenios extends Model
{
    use HasFactory;

    protected $table = 'canduenios';

    protected $fillable = [
        'can_duenios_can_codigo_letra', 'can_duenios_can_codigo_numero', 'can_duenios_cliente_cod',
        'can_duenios_desde', 'can_duenios_hasta', 'can_duenios_autorizacion', 'can_exduenio',
        'can_numero_transfer', 'can_duenios_marca_para_informes', 'can_duenios_primer_duenio',
        'can_datcodigousuario', 'can_duenios_tipo_transfer'
    ];
}
