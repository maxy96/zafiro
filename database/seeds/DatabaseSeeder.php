<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(InmobiliariasSeeder::class);
         $this->call(PerfilesSeeder::class);
         $this->call(EstadosPropiedadesSeeder::class);
         //$this->call(UserSeeder::class);
         //$this->call(PropiedadesSeeder::class);
         //$this->call(PropiedadesSolicitadasSeeder::class);
         //$this->call(AlquiladosSeeder::class);
         //$this->call(VendidosSeeder::class);
    }
}
