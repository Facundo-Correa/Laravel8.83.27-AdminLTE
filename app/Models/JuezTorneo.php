<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuezTorneo extends Model
{
    use HasFactory;
    
    protected $table = 'juez_torneo';

    protected $fillable = [
        'juez_codigo', 'torneo_ide'
    ];
}
