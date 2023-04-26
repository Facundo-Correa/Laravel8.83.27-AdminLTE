<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuotasimpagas extends Model
{
    use HasFactory;

    protected $table = 'cuotasimpagas';

    protected $fillable = [
        'cvcl_division_cvcl', 'cvcl_sucursal_imp', 'ctec_cliente_venta', 'cvcl_numero_cvcl', 'vctc_fecha_vto_fin',
        'cvcl_referencia_1', 'valor_cuota', 'datcodusuario'
    ];
}
