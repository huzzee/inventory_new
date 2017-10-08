<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('catagory_id');
            $table->unsignedInteger('type_id');
            $table->string('item_name');
            $table->text('description')->nullable();
            $table->string('item_unit')->nullable();
            $table->integer('opening_qnt')->default(0);
            $table->integer('current_qnt')->default(0);
            $table->integer('min_qnt')->default(0);
            $table->string('item_image')->nullable();
            $table->float('unit_price',7,2)->default(0);
            $table->float('discount_price',7,2)->default(0);
            $table->tinyInteger('discount_percent')->default(0);
            $table->boolean('is_saleable');
            $table->boolean('status');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('catagory_id')->references('id')->on('item_categories')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('item_types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
