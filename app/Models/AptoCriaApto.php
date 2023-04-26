<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AptoCriaApto extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    public $timestamps = false;

    protected $table = 'apto_cria_apto';

    protected $fillable = [
        'apto_cod', 'apto_desc'
    ];

}
