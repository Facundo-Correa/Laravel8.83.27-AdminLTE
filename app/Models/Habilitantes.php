<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilitantes extends Model
{
    use HasFactory;
    
    protected $table = 'habilitantes';

    protected $fillable = [
        'habilitantes_cod', 'cliente_cod'
    ];
}
