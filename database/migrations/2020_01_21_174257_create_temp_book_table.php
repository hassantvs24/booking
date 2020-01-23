<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uniqValue');
            $table->bigInteger('serviceID')->unsigned()->index();
            $table->foreign('serviceID')->references('id')->on('services')->onDelete('cascade')->onUpdate('No Action');
            $table->date('serviceDate');
            $table->bigInteger('timeSlotID')->unsigned()->index();//Get From Time Slot
            $table->foreign('timeSlotID')->references('id')->on('time_slot')->onDelete('No Action')->onUpdate('No Action');
            $table->string('package')->nullable();
            $table->double('pricing')->default(0);
            $table->integer('qty')->default(0);
            $table->unique(['uniqValue', 'serviceID']);
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
        Schema::dropIfExists('temp_book');
    }
}
