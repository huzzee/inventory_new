<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sup_name')->nullable();
            $table->string('sup_fullname')->nullable();
            $table->string('sup_email')->nullable();
            $table->integer('sup_phone')->nullable();
            $table->text('sup_address')->nullable();
            $table->string('key_person')->nullable();
            $table->string('sup_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
