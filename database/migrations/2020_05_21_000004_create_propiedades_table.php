<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->bigIncrements('id_propiedad');
            $table->integer('inmobiliaria_id')->unsigned();
            $table->integer('estadoPropiedad_id')->unsigned();
            $table->string('direccion', 120)->unique();
            $table->string('titulo', 40);
            $table->mediumText('caracteristica', 200);
            $table->string('slug', 200)->unique();
            $table->string('imagen');
            $table->decimal('precio', 12, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedades');
    }
}
