<?php

use Illuminate\Database\Seeder;

Use App\Models\Alquilados;

class AlquiladosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Alquilados::class, 30)->create();
    }
}
