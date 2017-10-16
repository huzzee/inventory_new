<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrnMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grn_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->integer('purchase_order_id')->unsigned();
            $table->integer('dn_code')->nullable();
            $table->timestamps();
        });

        Schema::table('grn_masters', function($table) {
         
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_order_masters');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grn_masters');
    }
}
