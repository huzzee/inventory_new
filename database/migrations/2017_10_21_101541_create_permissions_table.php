<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        Schema::table('permissions', function($table) {
         
            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('permissions');
    }
}
