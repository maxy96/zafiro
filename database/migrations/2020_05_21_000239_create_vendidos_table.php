<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendidos', function (Blueprint $table) {
            $table->bigIncrements('id_venta');
            $table->bigInteger('propiedadSolicitada_id')->unsigned();
            $table->date('fechaVendido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendidos');
    }
}
