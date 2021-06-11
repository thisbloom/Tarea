<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_curso",250);
            $table->string("desc_curso",5000);
            $table->string("precio_curso",20);
            $table->string("img_curso",150);

        });

        Schema::table('cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('creador_curso');
            $table->foreign('creador_curso')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
