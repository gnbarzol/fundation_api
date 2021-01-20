<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $table = 'supply';

    // Campos a mostrar
    protected $fillable = [
        'name',
        'id_property',
        'description',
        'amount'
    ];
    
    // Campos a ocultar
    protected $hidden = ['created_at', 'updated_at'];

}