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
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dni')->default('06280822M');
            $table->string('name');
            $table->string('lastname')->default('ninguno');
            $table->string('phone')->default(666666666);
            $table->string('city')->default('pm');
            $table->string('CP')->default(13620);
            $table->string('address')->default('ningunadirecc');
            $table->date('birthdate')->default('2021-05-20');
            $table->integer('isActive')->default(0);
            $table->rememberToken();
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
