<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantiDistrito extends Model
{
    use HasFactory;

    protected $connection = 'dbOnline';

    protected $fillable = [
        'id',
        'nombre',
        'utilizable'
    ];
}
