<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranter', function (Blueprint $table) {
            $table->increments('ranterID');
            $table->integer('serialNo')->nullable();
            $table->string('ranterType',50);//Student/SSC/HSC/Jobholder
            $table->string('name',100);
            $table->date('dob')->nullable();
            $table->string('religion',20)->nullable();
            $table->string('bloodGroup',5)->nullable();
            $table->string('contact',30)->nullable();
			$table->string('email',100)->nullable();
            $table->string('nid',20)->nullable();
            $table->string('birth_register',20)->nullable();
            $table->string('passport',15)->nullable();
            $table->string('nationality',40)->nullable();
            $table->string('occupation',40)->nullable();
            $table->string('maritalStatus',10)->default('Unmarried');
            $table->string('address',160)->nullable();
            $table->string('photo',160)->nullable();

            $table->string('guardian',100)->nullable();
            $table->string('relations',20)->nullable();
            $table->string('guardianContact',30)->nullable();
            $table->string('guardianOccupation',40)->nullable();
            $table->string('guardianNid',20)->nullable();
            $table->string('guardianAddress',160)->nullable();
            $table->string('guardianPhoto',160)->nullable();

            $table->string('guardian1',100)->nullable();
            $table->string('relations1',20)->nullable();
            $table->string('guardian1Contact',30)->nullable();
            $table->string('guardian1Occupation',40)->nullable();
            $table->string('guardian1Nid',20)->nullable();
            $table->string('guardian1Address',160)->nullable();
            $table->string('guardian1Photo',160)->nullable();

            $table->string('guardianLoc',100)->nullable();
            $table->string('relationsLoc',20)->nullable();
            $table->string('guardianContactLoc',30)->nullable();
            $table->string('guardianOccupationLoc',40)->nullable();
            $table->string('guardianNidLoc',20)->nullable();
            $table->string('guardianAddressLoc',160)->nullable();
            $table->string('guardianPhotoLoc',160)->nullable();

            $table->string('school',160)->nullable();//SSC
            $table->string('groupSSC',30)->nullable();//SSC
            $table->string('classSSC',5)->nullable();//SSC
            $table->string('rollSSC',30)->nullable();//SSC
            $table->string('sectionSSC',2)->nullable();//SSC
            $table->string('classTimeSSC',10)->nullable();//SSC
            $table->string('boardSSC',20)->nullable();//SSC
            $table->string('passYearSSC',5)->nullable();//SSC

            $table->string('college',160)->nullable();//HSC
            $table->string('groupHSC',30)->nullable();//HSC
            $table->string('sessionHSC',30)->nullable();//HSC
            $table->string('rollHSC',30)->nullable();//HSC
            $table->string('boardHSC',20)->nullable();//HSC
            $table->string('passYearHSC',5)->nullable();//HSC

            $table->string('universityHons',160)->nullable();//hons
            $table->string('subjectHons',30)->nullable();//hons
            $table->string('semesterHons',30)->nullable();//hons
            $table->string('studentIDHons',30)->nullable();//hons
            $table->string('yearsHons',5)->nullable();//hons

            $table->string('universityMS',160)->nullable();//MS
            $table->string('subjectMS',30)->nullable();//MS
            $table->string('semesterMS',30)->nullable();//MS
            $table->string('studentIDMS',30)->nullable();//MS
            $table->string('yearsMS',5)->nullable();//MS

            $table->string('institute',160)->nullable();//Coaching
            $table->string('subjectCo',30)->nullable();//Coaching
            $table->string('classTimeCo',30)->nullable();//Coaching

            $table->string('company',160)->nullable();//Employee
            $table->string('employeeID',30)->nullable();//Employee
            $table->string('designation',30)->nullable();//Employee
            $table->string('officeLocation',160)->nullable();//Employee

            $table->double('securityMoney')->default(0);
            $table->double('discount')->default(0);
            $table->double('adCharge')->default(0);
            $table->double('due')->default(0);
            $table->string('note',160)->nullable();
            $table->date('endDate')->nullable();
            $table->string('status')->default('Active');

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
        Schema::dropIfExists('ranter');
    }
}
