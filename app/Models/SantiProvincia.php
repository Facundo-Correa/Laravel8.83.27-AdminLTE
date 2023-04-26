<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiProvincia extends Model
{
    use HasFactory;

    protected $table = 'provincia';

    protected $connection = 'dbOnline';

    protected $fillable = [
        'nombre',
        'id_pais'
    ];
}
