<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre',90);
            $table->string('apellido',90);
            $table->string('cuit',12)->nullable()->unique();
            $table->string('documento',12)->unique();
            $table->string('email', 120)->nullable()->unique();
            $table->string('telefono', 25)->nullable();
            $table->date('fecha_nacimiento');
            $table->boolean('esta_activo');
            $table->char('genero_sigla',2);
            $table->string('imagen_perfil')->nullable();

            $table->foreign('genero_sigla')->references('sigla')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
