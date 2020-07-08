<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosPropiedades extends Model
{

    protected $table = 'estados_propiedades';

    protected $primaryKey = 'id_estadoPropiedad';

    protected $fillable = ['descripcion'];

    public $timestamps = false;
    
}
