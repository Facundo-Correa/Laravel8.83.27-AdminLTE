<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SISTPCIA extends Model
{
    use HasFactory;

    protected $table = 'sist_pcia';

    protected $fillable = [
        'PCIA_PROVINCIA',
        'PCIA_NOMBRE',
        'PCIA_UTILIZABLE',
        'PCIA_CODIGO_COT',
        'PCIA_PROVINCIA_ACER'
    ];
}
