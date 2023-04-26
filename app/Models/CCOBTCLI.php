<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCOBTCLI extends Model
{
    use HasFactory;

    protected $table = 'ccob_tcli';

    protected $fillable = [
        'TCLI_TIPO_CLI', 'TCLI_NOMBRE', 'TCLI_UTILIZABLE'
    ];
}
