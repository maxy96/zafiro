<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Precios extends Model
{
    protected $table = 'precios';

    protected $fillable = ['propiedad_id', 'iso', 'inmobiliaria_id'];

    protected $primaryKey = ['propiedad_id', 'iso', 'inmobiliaria_id'];

    public $incrementing = false;

    public $timestamps = false;
}
