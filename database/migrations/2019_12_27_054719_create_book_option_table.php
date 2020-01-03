<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_option', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bookingID')->unsigned()->index();
            $table->foreign('bookingID')->references('id')->on('booking')->onDelete('cascade')->onUpdate('No Action');
            $table->bigInteger('serviceID')->unsigned()->index();
            $table->foreign('serviceID')->references('id')->on('services')->onDelete('cascade')->onUpdate('No Action');
            $table->date('serviceDate');
            $table->time('fromTime')->nullable();//Get From Time Slot
            $table->time('toTime')->nullable();//Get From Time Slot
            $table->double('pricing')->default(0);
            $table->integer('qty')->default(0);
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
        Schema::dropIfExists('book_option');
    }
}
