<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('titulo',150);
            $table->text('observaciones')->nullable();
            $table->date('fecha')->default(now());
            $table->string('url_archivo',150);
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
        Schema::dropIfExists('informes');
    }
}
