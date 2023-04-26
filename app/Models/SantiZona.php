<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiZona extends Model
{
    use HasFactory;

    protected $table = 'zona';

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'nombre'
    ];
}
