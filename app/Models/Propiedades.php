<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedades extends Model
{

	protected $table = 'propiedades';

	protected $primaryKey = 'id_propiedad';

	protected $fillable = [
		'inmobiliaria_id',
		'estadoPropiedad_id',
		'direccion',
		'titulo',
		'caracteristica',
		'imagen',
		'slug',
		'precio'
	];

	public $timestamps = false;

	public function inmobiliaria()
	{
		return $this->belongsTo(Inmobiliarias::class, 'inmobiliaria_id', 'id_inmobiliaria');
	}

	public function galeria()
	{
		return $this->hasMany(Galerias::class, 'propiedad_id', 'id_propiedad');
	}
}
