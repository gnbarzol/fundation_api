<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oxigen extends Model
{
    protected $table = 'oxigen';

    // Campos a mostrar
    protected $fillable = [
        'id_property',
        'description',
        'capacity',
        'amount'
    ];
    
    // Campos a ocultar
    protected $hidden = ['created_at', 'updated_at'];
}