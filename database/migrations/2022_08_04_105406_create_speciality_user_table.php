<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialityUserTable extends Migration
{ /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
       Schema::create('speciality_user', function (Blueprint $table) {
           // $table->engine = 'InnoDB';
            $table->bigIncrements('id');
           // //dentista
            $table->unsignedBigInteger('user_id');

           $table->foreign('user_id')
            ->references('id')
           ->on('users')
            ->onDelete('cascade');
           // //especialidad del dentista
            $table->unsignedBigInteger('speciality_id');

            $table->foreign('speciality_id')
            ->references('id')
           ->on('specialities')
            ->onDelete('cascade');

        //    $table->foreignId('user_id')->constrained('users')
        //    ->onUpdate('cascade')
        //    ->onDelete('cascade');
        //    $table->foreignId('specialty_id')->constrained('specialities')
        //    ->onUpdate('cascade')
        //    ->onDelete('cascade');



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
    //    Schema::table('specialty_user', function (Blueprint $table) {
    //        $table->dropForeign(['user_id']);
    //        $table->dropForeign(['specialty_id']);
    //    });
       Schema::dropIfExists('speciality_user');
       // DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
