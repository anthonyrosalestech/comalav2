<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::dropIfExists('archivos');

    Schema::create('archivos', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('id_tramite_proceso')->index();
      $table->string('clave_catastral')->index();
      $table->string('nombre');
      $table->string('url');
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
    Schema::dropIfExists('archivos');
  }
}
