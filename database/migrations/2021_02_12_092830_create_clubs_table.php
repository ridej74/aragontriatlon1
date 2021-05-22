<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('telefonos')->nullable();
            $table->string('http')->nullable();
            $table->string('mail')->nullable();
            $table->string('facebook')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('clubs');
        File::delete(File::glob('storage/app/public/uploads/uploads-club/*.jpg'));
    }
}
