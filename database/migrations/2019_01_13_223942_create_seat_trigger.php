<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER seat_trigger BEFORE UPDATE ON `seat` FOR EACH ROW

                BEGIN

                   UPDATE booking SET 
                        seatType = NEW.seatType,
                        building = NEW.building,
                        floor = NEW.floor,
                        room = NEW.room,
                        seatNumber = NEW.seatNumber
                   WHERE seatID = OLD.seatID;
                         
                     UPDATE billing SET 
                        seatType = NEW.seatType,
                        building = NEW.building,
                        floor = NEW.floor,
                        room = NEW.room,
                        seatNumber = NEW.seatNumber
                     WHERE seatID = OLD.seatID;

                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `seat_trigger`');
    }
}
