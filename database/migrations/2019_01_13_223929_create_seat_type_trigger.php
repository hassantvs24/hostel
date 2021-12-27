<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatTypeTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER seat_type_trigger BEFORE UPDATE ON `seat_type` FOR EACH ROW

                BEGIN

                   UPDATE seat SET 
                        seatType = NEW.name,
                        colour = NEW.colour
                         WHERE seatTypeID = OLD.seatTypeID;

                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `seat_type_trigger`');
    }
}
