<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requisition_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->string('purchase_code');
            $table->string('quatation_nmbr')->nullable();
            $table->integer('approval_by')->unsigned()->nullable();
            $table->boolean('approved')->default(0);
            $table->boolean('rejected')->default(0);
            $table->boolean('printed')->default(0);
            $table->timestamp('approval_date')->nullable();
            $table->date('created_date');
            $table->timestamps();
        });

        Schema::table('purchase_order_masters', function($table) {
         
           
            $table->foreign('requisition_id')->references('id')->on('requisitions');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('approval_by')->references('id')->on('users');
            
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_masters');
    }
}
