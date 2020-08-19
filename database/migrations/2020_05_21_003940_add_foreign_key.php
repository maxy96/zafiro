<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TABLA PROPIEDADES
        Schema::table('propiedades', function (Blueprint $table) {
            $table->foreign('inmobiliaria_id')->references('id_inmobiliaria')->on('inmobiliarias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('estadoPropiedad_id')->references('id_estadoPropiedad')->on('estados_propiedades')->onDelete('cascade')->onUpdate('cascade');
        });

        //TABLA PROPIEDADES SOLICITADAS
        Schema::table('propiedades_solicitadas', function(Blueprint $table){
            $table->foreign('propiedad_id')->references('id_propiedad')->on('propiedades')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        //TABLA VENDIDOS
        Schema::table('vendidos', function(Blueprint $table){
            $table->foreign('propiedadSolicitada_id')->references('id_propiedadSolicitada')->on('propiedades_solicitadas')
            ->onDelete('cascade')->onUpdate('cascade');
        });   

        //TABLA ALQUILADOS
        Schema::table('alquilados', function(Blueprint $table){
            $table->foreign('propiedadSolicitada_id')->references('id_propiedadSolicitada')->on('propiedades_solicitadas')
            ->onDelete('cascade')->onUpdate('cascade');
        });  

        //TABLA GALERIAS
        Schema::table('galerias', function(Blueprint $table){
            $table->foreign('propiedad_id')->references('id_propiedad')->on('propiedades')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->primary(array('propiedad_id', 'imagen'));        
        });  

        //TABLA PRECIOS
        Schema::table('precios', function(Blueprint $table){
            $table->foreign('propiedad_id')->references('id_propiedad')->on('propiedades')
            ->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('inmobiliaria_id')->references('id_inmobiliaria')->on('inmobiliarias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('iso')->references('iso')->on('monedas')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->primary(array('propiedad_id', 'iso'));        
        });

        //TABLA DIRECCIONES  
        Schema::table('direcciones', function(Blueprint $table){
            $table->foreign('propiedad_id')->references('id_propiedad')->on('propiedades')
            ->onDelete('cascade')->onUpdate('cascade');
        });
        //TABLA USUARIOS
        Schema::table('users', function(Blueprint $table){
            $table->foreign('perfil_id')->references('id_perfil')->on('perfiles')
            ->onDelete('cascade')->onUpdate('cascade');        
        });  

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DIRECCIONES DROP FOREIGN KEY
        Schema::table('direcciones', function (Blueprint $table) {
            $table->dropForeign(['propiedad_id']);
        });
        //PRECIOS DROP FOREIGN KEY
        Schema::table('precios', function (Blueprint $table) {
            $table->dropForeign(['propiedad_id', 'iso']);
        });
        //GALERIAS DROP FOREIGN KEY
        Schema::table('galerias', function (Blueprint $table) {
            $table->dropForeign(['propiedad_id']);
        });
        //USERS DROP FOREIGN KEY
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['perfil_id']);
        });

        //ALQUILADOS DROP FOREIGN KEY
        Schema::table('alquilados', function (Blueprint $table) {
            $table->dropForeign(['propiedadSolicitada_id']);
        });

        //VENDIDOS DROP FOREIGN KEY
        Schema::table('vendidos', function (Blueprint $table) {
            $table->dropForeign(['propiedadSolicitada_id']);
        });

        //PROPIEDADES_SOLICITADAS DROP FOREIGN KEY
        Schema::table('propiedades_solicitadas', function (Blueprint $table) {
            $table->dropForeign(['propiedad_id']);
            $table->dropForeign(['user_id']);
        });

        //PROPIEDADES DROP FOREIGN KEY
        Schema::table('propiedades', function (Blueprint $table) {
            $table->dropForeign(['inmobiliaria_id']);
            $table->dropForeign(['estadoPropiedad_id']);
        });
    }
}
