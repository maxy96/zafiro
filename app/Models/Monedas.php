<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monedas extends Model
{
    protected $table = 'monedas';

    protected $fillable = ['iso'];

    protected $primaryKey = 'iso';

    public $incrementing = false;

    public $timestamps = false;
}
