<?php

use Illuminate\Database\Seeder;

use App\Models\Propiedades;

class PropiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Propiedades::class, 30)->create();
    }
}
