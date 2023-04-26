<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiPais extends Model
{
    use HasFactory;

    protected $table = 'pais';

    protected $connection = 'dbOnline';

    protected $fillable = [
        'nombre',
    ];
}
