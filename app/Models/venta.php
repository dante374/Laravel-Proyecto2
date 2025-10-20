<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
     protected $table = 'venta';
    protected $fillable = [
        'descripcion',
        'cant_articulos',
        'precio',
        'fecha_venta'
    ];
}
