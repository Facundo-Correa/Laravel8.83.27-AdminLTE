<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCOBCLC4 extends Model
{
    use HasFactory;

    protected $table = 'ccob_clc4';

    protected $fillable = ['CLC4_CLASIF_4', 'CLC4_NOMBRE', 'CLC4_UTILIZABLE'];
}
