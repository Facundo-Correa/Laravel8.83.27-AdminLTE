<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCOBCLC2 extends Model
{
    use HasFactory;

    protected $table = 'ccob_clc2';

    protected $fillable = [
        'CLC2_CLASIF_2', 'CLC2_NOMBRE', 'CLC2_UTILIZABLE'
    ];
}
