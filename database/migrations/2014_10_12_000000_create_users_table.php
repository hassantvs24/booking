<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact',11)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('userType')->default('Customer');//Official/Agent/Customer
            $table->bigInteger('userRuleID')->nullable()->unsigned()->index();
            $table->foreign('userRuleID')->references('id')->on('user_rules')->onDelete('set null')->onUpdate('No Action');
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->double('balance')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
