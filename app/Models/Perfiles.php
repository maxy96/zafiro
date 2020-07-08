<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
	protected $table = 'perfiles';

    protected $fillable = ['descripcion'];
    
    protected $primaryKey = 'id_perfil';

    public $timestamps = false;
}
