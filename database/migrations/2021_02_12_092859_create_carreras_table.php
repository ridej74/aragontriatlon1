<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->string('modalidad')->nullable();
            $table->text('competicion')->nullable();
            $table->string('localidad')->nullable();
            $table->string('provincia')->nullable();
            $table->date('fecha');
            $table->string('distancia_1')->nullable();
            $table->string('distancia_2')->nullable();
            $table->string('distancia_3')->nullable();
            $table->string('juez_arbitro')->nullable();
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
        Schema::dropIfExists('carreras');
    }
}
