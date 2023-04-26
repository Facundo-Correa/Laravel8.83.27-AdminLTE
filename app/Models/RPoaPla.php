<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPoaPla extends Model
{
    use HasFactory;
    
    protected $table = 'r_poa_pla';

    protected $fillable = [
        'tipo_cliente_pla', 'tipo_cliente_desc_pla', 'tratam_normal', 'tratam_moroso',
        'delegacion', 'agrupacion', 'bonificado', 'socio'
    ];
}
