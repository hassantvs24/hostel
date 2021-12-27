<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanterTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER ranter_trigger BEFORE UPDATE ON `ranter` FOR EACH ROW

                BEGIN

                   UPDATE booking SET 
                        ranterName = NEW.name,
                        ranterType = NEW.ranterType
                   WHERE ranterID = OLD.ranterID;
                         
                     UPDATE billing SET 
                        ranterName = NEW.name,
                        ranterType = NEW.ranterType
                   WHERE ranterID = OLD.ranterID;

                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `ranter_trigger`');
    }
}
