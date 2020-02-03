<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serviceType', 20);//All Service
            $table->string('name');
            $table->bigInteger('locationID')->nullable()->unsigned()->index();
            $table->foreign('locationID')->references('id')->on('location')->onDelete('set null')->onUpdate('No Action');
            $table->bigInteger('vendorID')->nullable()->unsigned()->index();
            $table->foreign('vendorID')->references('id')->on('users')->onDelete('cascade')->onUpdate('No Action');
            $table->decimal('lat')->default(23.777176);
            $table->decimal('lon')->default(90.399452);
            $table->integer('minGuest')->default(1);
            $table->integer('maxGuest')->default(1);
            $table->string('landmark')->nullable();
            $table->string('email',150)->nullable();
            $table->string('website')->nullable();
            $table->text('photos')->nullable();
            $table->text('contact')->nullable();
            $table->text('pricing')->nullable();
            $table->text('facility')->nullable();
            $table->text('rules')->nullable();
            $table->text('additional')->nullable();
            $table->text('social')->nullable();
//            $table->json('photos')->nullable();
//            $table->json('contact')->nullable();
//            $table->json('pricing')->nullable();
//            $table->json('facility')->nullable();
//            $table->json('rules')->nullable();
//            $table->json('additional')->nullable();
//            $table->json('social')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->float('rating')->default(0);
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
        Schema::dropIfExists('services');
    }
}
