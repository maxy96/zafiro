<?php

use Illuminate\Database\Seeder;

Use App\Models\Vendidos;

class VendidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vendidos::class, 30)->create();
    }
}
