<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jueces extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    public $timestamps = false;
    
    protected $table = 'jueces';

    protected $fillable = [
        'jueces_cod', 'cliente_cod'
    ];
}
