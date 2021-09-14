<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('fecha_inicio')->default(now());
            $table->date('fecha_fin')->default(now());
            $table->boolean('esta_activo')->default(true);
            
            $table->unsignedBigInteger('paciente_id');

            $table->foreign('paciente_id')->references('id')->on('pacientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
