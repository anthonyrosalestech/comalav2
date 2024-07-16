<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadronCatastralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padron_catastral', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave_catastral')->index()->nullable();
            $table->string('cum')->index()->nullable();
            $table->string('apellido_paterno')->index()->nullable();
            $table->string('apellido_materno')->index()->nullable();
            $table->string('nombre')->index()->nullable();
            $table->string('denominacion')->nullable();
            $table->string('medida_frente')->nullable();
            $table->string('medida_profundidad')->nullable();
            $table->string('superficie_terreno')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padron_catastral');
    }
}
