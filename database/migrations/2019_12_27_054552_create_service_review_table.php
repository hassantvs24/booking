<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_review', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userID')->unsigned()->index();
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('No Action');
            $table->bigInteger('serviceID')->unsigned()->index();
            $table->foreign('serviceID')->references('id')->on('services')->onDelete('cascade')->onUpdate('No Action');
            $table->float('rating')->default(0);
            $table->string('comment');
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
        Schema::dropIfExists('service_review');
    }
}
