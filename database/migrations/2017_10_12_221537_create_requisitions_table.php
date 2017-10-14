<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('user_id')->unsigned();
            $table->integer('department_id');
            $table->text('reason');
            
            $table->boolean('approved')->default(0);
            $table->boolean('issued')->default(0);
            $table->boolean('rejected')->default(0);
            $table->timestamps();
        });

        Schema::table('requisitions', function($table) {
         
            $table->foreign('user_id')->references('id')->on('users');
            
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisitions');
    }
}
