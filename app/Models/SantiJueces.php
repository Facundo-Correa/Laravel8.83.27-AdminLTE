<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiJueces extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'id_persona',
        'id_categoria',
        'id_jueces_tipo'
    ];
}
