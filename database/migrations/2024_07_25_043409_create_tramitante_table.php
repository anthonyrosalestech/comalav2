<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramitante', function (Blueprint $table) {
            $table->id();
            $table->string('id_tramite_proceso')->nullable();
            $table->string('nombre')->nullable();
            $table->string('calle')->nullable();
            $table->string('localidad')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('numero')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('telefono')->nullable();
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
        Schema::dropIfExists('tramitante');
    }
}
