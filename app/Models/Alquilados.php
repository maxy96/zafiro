<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alquilados extends Model
{
    
    protected $table = 'alquilados';

    protected $primaryKey = 'id_alquilado';

    protected $fillable = [
    	'propiedadSolicitada_id',
		'fechaVencimiento'
    ];

    public $timestamps = false;

}
