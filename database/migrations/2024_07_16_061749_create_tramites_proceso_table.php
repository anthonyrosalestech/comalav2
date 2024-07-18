<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesProcesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites_proceso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_padron_catastral')->index();
            $table->unsignedBigInteger('id_tipo_tramite')->index();
            $table->unsignedBigInteger('id_tipo_proceso')->index();
            $table->unsignedBigInteger('id_uso_suelo')->index()->nullable();
            $table->string('nooficial')->index()->nullable();
            $table->string('elaboro')->nullable();
            $table->string('reviso')->nullable();
            $table->string('certifico')->nullable();
            $table->string('entrega')->nullable();
            $table->string('historico')->nullable();
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
        Schema::dropIfExists('tramites_proceso');
    }
}
