<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwapLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swap_log', function (Blueprint $table) {
            $table->increments('swapID');
            $table->integer('serialNo')->nullable();
            $table->integer('seatID_one');
            $table->integer('seatID_two');
            $table->integer('ranterID_one')->nullable();
            $table->integer('ranterID_two')->nullable();
            $table->double('amount_one')->default(0);
            $table->double('amount_two')->default(0);
            $table->string('productCode', 20)->default('START');
            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('id')->on('users')->onDelete('No Action')->onUpdate('No Action');
            $table->softDeletes();
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
        Schema::dropIfExists('swap_log');
    }
}
