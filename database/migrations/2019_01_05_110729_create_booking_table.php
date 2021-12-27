<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('bookingID');
            $table->integer('serialNo')->nullable();
            $table->integer('ranterID')->nullable();
            $table->string('ranterName',100)->nullable();
            $table->string('ranterType',100)->nullable();

            $table->integer('seatID')->nullable();
            $table->string('seatType',50)->nullable();
            $table->string('building',10)->nullable();
            $table->string('floor',10)->nullable();
            $table->string('room',20)->nullable();
            $table->string('seatNumber',30)->nullable();

            $table->double('admissionFees')->default(0);
            $table->double('securityMoney')->default(0);

            $table->string('bookingStatus',20)->default('Booked');
            $table->date('bookingCancelDate')->nullable();
            $table->string('bookingNote',160)->nullable();

            $table->string('branchName',100)->nullable();
            $table->integer('branchID')->nullable();  //Branch
            $table->unique('seatID', 'ranterID');
            $table->string('productCode', 20)->default('START');
            $table->integer('userID')->unsigned();
            $table->foreign('userID')->references('id')->on('users')->onDelete('No Action')->onUpdate('No Action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
