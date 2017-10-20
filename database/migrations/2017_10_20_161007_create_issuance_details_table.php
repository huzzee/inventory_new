<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuanceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issuance_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('issuance_master_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->double('issued_qnt',15,3)->default(0);
            $table->timestamps();
        });

        Schema::table('issuance_details', function($table) {
         
            $table->foreign('issuance_master_id')->references('id')->on('issuance_masters');
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
        Schema::dropIfExists('issuance_details');
    }
}
