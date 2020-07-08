<?php

use Illuminate\Database\Seeder;
use App\Models\Perfiles;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$perfiles = ["Admin", "Cliente"];
		foreach ($perfiles as $perfil) {
		    Perfiles::create([
		    	'descripcion' => $perfil
		    ]);
		}        
    }
}
