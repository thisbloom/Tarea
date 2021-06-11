<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->string("titulo",250);
            $table->string("descripción",250);
            $table->string("video",250);
        });

        Schema::table('temas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_curso_tema');
            $table->foreign('id_curso_tema')->references('id')->on('cursos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temas');
    }
}
