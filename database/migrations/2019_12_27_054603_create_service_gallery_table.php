<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('serviceID')->unsigned()->index();
            $table->foreign('serviceID')->references('id')->on('services')->onDelete('cascade')->onUpdate('No Action');
            $table->string('name')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('service_gallery');
    }
}
