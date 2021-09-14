<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->boolean('tiene_cud')->default(false);
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('prestador_id');

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('prestador_id')->references('id')->on('prestadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
