<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCOBACLI extends Model
{
    use HasFactory;

    protected $table = 'ccob_acli';

    protected $fillable = ['ACLI_ACTIVIDAD_CLI', 'ACLI_NOMBRE', 'ACLI_UTILIZABLE'];
}
