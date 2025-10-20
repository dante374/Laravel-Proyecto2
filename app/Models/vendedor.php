<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
    protected $table = 'vendedor';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'fecha_nacimiento'
    ];
}

