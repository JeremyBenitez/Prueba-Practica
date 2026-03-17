<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'año',
        'precio',
        'color',
        'kilometraje',
        'descripcion',
        'image'
    ];
}