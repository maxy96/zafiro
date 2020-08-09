<?php

use Illuminate\Database\Seeder;

Use App\Models\Monedas;

class MonedasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = ["ARS", "USD"];
		foreach ($monedas as $moneda) {
		    Monedas::create([
		    	'iso' => $moneda
		    ]);
		}
    }
}
