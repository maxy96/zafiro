<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendidos extends Model
{
	protected $table = 'vendidos';

	protected $primaryKey = 'id_alquilado';

	protected $fillable = [
		'propiedadSolicitada_id',
		'fechaVendido'
	];

	public $timestamps = false;
}
