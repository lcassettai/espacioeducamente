<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('codigo_area',10);
            $table->string('numero', 20);
            $table->string('compania', 45);

            $table->unsignedBigInteger('persona_id');

            $table->foreign('persona_id')->references('id')->on('personas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
}
