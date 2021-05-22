<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletaClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atleta_club', function (Blueprint $table) {
            $table->unsignedBigInteger('atleta_id');
            $table->unsignedBigInteger('club_id');
            $table-> date('fecha_alta');
            $table-> date('fecha_baja')->nullable();

            $table->foreign('atleta_id')->references('id')->on('atletas')->onDelete('cascade');
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atleta_club');
    }
}
