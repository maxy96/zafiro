<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquiladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquilados', function (Blueprint $table) {
            $table->bigIncrements('id_alquiler');
            $table->bigInteger('propiedadSolicitada_id')->unsigned();
            $table->date('fechaVencimiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alquilados');
    }
}
