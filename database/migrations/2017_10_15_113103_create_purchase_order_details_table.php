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
            $table->integer('purchase_master_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('order_qnt');
            $table->float('item_rate',7,2);
            $table->float('total_amount',7,2);
            $table->timestamps();
        });

        Schema::table('purchase_order_details', function($table) {
         
           
            $table->foreign('purchase_master_id')->references('id')->on('purchase_order_masters');
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
