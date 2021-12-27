<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillNameTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER bill_name_trigger BEFORE UPDATE ON `billing_name` FOR EACH ROW

                BEGIN

                   UPDATE billing SET 
                        billName = NEW.name
                         WHERE billNameID = OLD.billNameID;

                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `bill_name_trigger`');
    }
}
