<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('specialty_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            //dentista
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            //especialidad del dentista
            $table->unsignedBigInteger('specialty_id');

            $table->foreign('specialty_id')
            ->references('id')
            ->on('specialities')
            ->onDelete('cascade');

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
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::table('specialty_user', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('specialty_id');
        });
        Schema::dropIfExists('specialty_user');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1');

     }
}
