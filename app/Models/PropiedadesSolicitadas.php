<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropiedadesSolicitadas extends Model
{
   
   protected $table = 'propiedades_solicitadas';

   protected $primaryKey = 'id_propiedadSolicitada';

   protected $fillable = [
   		'propiedad_id',
		'user_id',
		'fechaSolicitada'
   ];

   public $timestamps = false;

}
