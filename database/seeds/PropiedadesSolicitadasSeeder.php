<?php

use Illuminate\Database\Seeder;

use App\Models\PropiedadesSolicitadas;

class PropiedadesSolicitadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PropiedadesSolicitadas::class, 30)->create();
    }
}
