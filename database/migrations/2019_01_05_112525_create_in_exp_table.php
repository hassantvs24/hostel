<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInExpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_exp', function (Blueprint $table) {
            $table->increments('inExpID');
            $table->integer('serialNo')->nullable();
            $table->string('category',160)->nullable();
            $table->string('source',160)->nullable();
            $table->double('amountIN')->default(0);
            $table->double('amountOUT')->default(0);
            $table->string('description')->nullable();
            $table->string('sector',10)->default('Expense');//OR Income
            $table->string('trType',3)->default('OUT');
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
        Schema::dropIfExists('in_exp');
    }
}
