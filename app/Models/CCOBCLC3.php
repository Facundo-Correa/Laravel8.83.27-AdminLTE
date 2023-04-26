<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCOBCLC3 extends Model
{
    use HasFactory;

    protected $table = 'ccob_clc3';

    protected $fillable = ['CLC3_CLASIF_3', 'CLC3_NOMBRE', 'CLC3_UTILIZABLE'];
}
