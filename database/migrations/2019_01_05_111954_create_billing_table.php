<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->increments('billingID');
            $table->integer('serialNo')->nullable();

            $table->integer('billNameID')->nullable();
            $table->string('billName',100);

            $table->integer('ranterID')->nullable();
            $table->string('ranterName',100)->nullable();
            $table->string('ranterType',100)->nullable();

            $table->integer('seatID')->nullable();
            $table->string('seatType',50)->nullable();
            $table->string('building',10)->nullable();
            $table->string('floor',10)->nullable();
            $table->string('room',20)->nullable();
            $table->string('seatNumber',30)->nullable();

            $table->double('amount')->default(0);
            $table->double('preDue')->default(0);
            $table->double('discount')->default(0);
            $table->double('adCharge')->default(0);

            $table->integer('branchID')->nullable();  //Branch
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
        Schema::dropIfExists('billing');
    }
}
