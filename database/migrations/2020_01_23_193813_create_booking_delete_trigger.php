<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateBookingDeleteTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER booking_delete_trigger BEFORE DELETE ON booking FOR EACH ROW
            BEGIN
                DELETE FROM payment WHERE ref = "Booking" AND refID = OLD.id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `booking_delete_trigger`');
    }
}
