<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = 'direcciones';

    protected $primaryKey = 'propiedad_id';

    protected $fillable = ['propiedad_id', 'direccion', 'lat', 'lon'];

    public $incrementing = false;

    public $timestamps = false;
}
