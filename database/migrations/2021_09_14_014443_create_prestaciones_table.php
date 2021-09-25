<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('fecha_alta');
            $table->boolean('esta_activo')->default(true);
            $table->text('observaciones')->nullable();
            $table->integer('sesiones_asignadas')->nullable();
            
            $table->unsignedBigInteger('tratamiento_id');
            $table->unsignedBigInteger('prestador_id');
            $table->unsignedBigInteger('servicio_id');

            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');
            $table->foreign('prestador_id')->references('id')->on('prestadores');
            $table->foreign('servicio_id')->references('id')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestaciones');
    }
}
