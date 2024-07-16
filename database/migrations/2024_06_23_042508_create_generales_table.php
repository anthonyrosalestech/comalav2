<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave_catastral')->index()->nullable();
            $table->string('tipo_predio')->nullable();
            $table->string('tarjeta')->nullable();
            $table->string('folio_real')->nullable();
            $table->string('fecha_alta')->nullable();
            $table->string('ultimo_movimiento_catastral')->nullable();
            $table->string('fecha_ultimo_movimiento_catastral')->nullable();
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
        Schema::dropIfExists('generales');
    }
}
