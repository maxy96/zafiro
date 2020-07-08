<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galerias extends Model
{
    protected $table = 'galerias';

    protected $fillable = ['propiedad_id', 'imagen'];

    protected $primaryKey = ['propiedad_id', 'imagen'];

    public $incrementing = false;

    public $timestamps = false;

    public function propiedad()
    {
    	return $this->belongsTo(Propiedades::class, 'id_propiedad', 'propiedad_id');
    }
}
