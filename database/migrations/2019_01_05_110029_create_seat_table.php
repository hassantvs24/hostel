<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat', function (Blueprint $table) {
            $table->increments('seatID');
            $table->integer('serialNo')->nullable();
            $table->string('building',10)->nullable();
            $table->string('floor',10)->nullable();
            $table->string('room',20)->nullable();
            $table->string('seatNumber',30)->nullable(); //Building Number - Room Number - Seat Number - Renter Serial
            $table->integer('branchID')->nullable();  //Branch
            $table->string('branchName',100)->nullable();//Branch
            $table->integer('seatTypeID')->nullable();//Seat Price type
            $table->string('seatType',50)->nullable();//Seat Price type
            $table->string('colour',20)->nullable();//Seat Color type
            $table->double('amount')->default(0);
            $table->string('description',160)->nullable();
            $table->integer('ranterID')->unique()->nullable();//Renter ID Must Unique
            $table->string('status',30)->default('Available');
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
        Schema::dropIfExists('seat');
    }
}
