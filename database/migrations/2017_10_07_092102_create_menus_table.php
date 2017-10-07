<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_name');
            $table->string('menu_slug')->nullable();
            $table->integer('parent_menu_id')->nullable();
            $table->integer('order');
            //$table->integer('role_id')->unsigned();
            $table->string('icon')->nullable();
            $table->string('menu_route')->nullable();
            $table->integer('active');
            $table->integer('hidden');
            $table->integer('sort_order');
            $table->timestamps();

            //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
