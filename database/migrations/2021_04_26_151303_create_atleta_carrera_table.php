<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletaCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atleta_carrera', function (Blueprint $table) {
            $table->unsignedBigInteger('atleta_id');
            $table->unsignedBigInteger('carrera_id');
            $table-> time('tiempo_1');
            $table-> time('tiempo_2')->nullable();
            $table-> time('tiempo_3')->nullable();
            $table-> time('tiempo_total')->nullable();
            $table-> integer('posicion_total')->nullable();
            $table-> integer('posicion_categoria')->nullable();
            $table-> integer('puntos')->nullable();
            $table-> string('categoria')->nullable();

            $table->foreign('atleta_id')->references('id')->on('atletas')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atleta_carrera');
    }
}
