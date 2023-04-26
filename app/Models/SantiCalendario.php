<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiCalendario extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'fecha',
        'content',
        'jueces',
        'informacion',
        'type',
        'day',
        'month',
        'year'
    ];
}
