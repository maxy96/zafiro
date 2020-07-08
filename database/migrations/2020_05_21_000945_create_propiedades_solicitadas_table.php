<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesSolicitadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades_solicitadas', function (Blueprint $table) {
            $table->bigIncrements('id_propiedadSolicitada');
            $table->bigInteger('propiedad_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date('fechaSolicitada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedades_solicitadas');
    }
}
