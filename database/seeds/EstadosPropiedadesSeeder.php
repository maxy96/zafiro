<?php

use Illuminate\Database\Seeder;

use App\Models\EstadosPropiedades;

class EstadosPropiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = ["Disponible", "Ocupado"];
		foreach ($estados as $estado) {
		    EstadosPropiedades::create([
		    	'descripcion' => $estado
		    ]);
		}
    }
}
