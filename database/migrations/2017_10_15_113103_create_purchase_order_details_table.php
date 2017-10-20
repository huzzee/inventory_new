<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_order_master_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('order_qnt');
            $table->double('item_rate',15,3);
            $table->double('total_amount',15,3);
            $table->timestamps();
        });

        Schema::table('purchase_order_details', function($table) {
         
           
            $table->foreign('purchase_order_master_id')->references('id')->on('purchase_order_masters');
            $table->foreign('item_id')->references('id')->on('items');
            
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_details');
    }
}
