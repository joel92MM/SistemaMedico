<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('dia');
            $table->boolean('active');
            $table->string('morning_start');
            $table->string('morning_end');
            $table->string('afternoon_start');
            $table->string('afternoon_end');
            // aqui va la clave foranea
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Funcion que borra las tablas
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
