<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasocialPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obrasocial_paciente', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nro_afiliado',45);
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('obrasocial_id');

            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('obrasocial_id')->references('id')->on('obras_sociales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obrasocial_paciente');
    }
}
