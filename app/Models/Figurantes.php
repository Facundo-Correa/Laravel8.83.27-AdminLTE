<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figurantes extends Model
{
    use HasFactory;

    protected $table = 'figurantes';

    protected $fillable = [
        'figurante_cod',
        'cliente_cod',
    ];
}
