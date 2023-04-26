<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCOBCLC1 extends Model
{
    use HasFactory;

    protected $table = 'ccob_clc1';

    protected $fillable = ['CLC1_CLASIF_1', 'CLC1_NOMBRE', 'CLC1_UTILIZABLE',
    'CLC1_HAB_PROM_VOL'];
}

