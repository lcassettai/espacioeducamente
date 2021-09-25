<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesiones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('observaciones')->nullable();
            $table->date('fecha');
            $table->smallInteger('evaluacion');
            $table->unsignedBigInteger('prestacion_id');

            $table->foreign('prestacion_id')->references('id')->on('prestaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesiones');
    }
}
