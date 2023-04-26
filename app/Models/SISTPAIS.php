<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SISTPAIS extends Model
{
    use HasFactory;

    protected $table = 'sist_pais';

    protected $fillable = ['PAIS_PAIS', 'PAIS_NOMBRE', 'PAIS_UTILIZABLE', 'PAIS_COD_PAIS_ONCCA',
                            'PAIS_DESTINO_ONCCA', 'PAIS_COD_PAIS_AFIP', 'PAIS_ISO_INTERNACIONAL'];
}
