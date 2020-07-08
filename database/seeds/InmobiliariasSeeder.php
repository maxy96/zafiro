<?php

use Illuminate\Database\Seeder;
use App\Models\Inmobiliarias;

class InmobiliariasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$inmobiliarias = ["Venta", "Alquiler"];
		foreach ($inmobiliarias as $inmobiliaria) {
		    Inmobiliarias::create([
		    	'inmobiliaria' => $inmobiliaria
		    ]);
		}        
    }
}
