<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsoSueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uso_suelo', function (Blueprint $table) {
            $table->id();
            $table->string('zona')->index();
            $table->string('nomenclatura')->index();
            $table->string('uso_suelo')->nullable();
            $table->string('cos')->nullable();
            $table->string('cus')->nullable();
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
        Schema::dropIfExists('uso_suelo');
    }
}
