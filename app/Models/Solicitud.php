<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';

    // Campos a mostrar
    protected $fillable = [
        'namePerson',
        'id_property',
        'description',
        'amount',
        'nameProduct'
    ];
    
    // Campos a ocultar
    protected $hidden = ['created_at', 'updated_at'];

}