<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grn_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grn_master_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->float('recieved_qnt',15,3);
            $table->float('per_unit_rate',15,3);
            $table->float('total_amount',15,3);
            $table->timestamps();
        });

        Schema::table('grn_details', function($table) {
         
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('grn_master_id')->references('id')->on('grn_masters');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grn_details');
    }
}
