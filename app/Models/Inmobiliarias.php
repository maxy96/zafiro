<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inmobiliarias extends Model
{

    protected $table = 'inmobiliarias';

    protected $primaryKey = 'id_inmobiliaria';

    protected $fillable = ['inmobiliaria'];

    public $timestamps = false;

    public function propiedades()
    {
    	return $this->hasMany(Propiedades::class, 'inmobiliaria_id', 'id_inmobiliaria');
    }

}
