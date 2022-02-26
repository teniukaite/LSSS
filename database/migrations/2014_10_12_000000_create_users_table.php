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
            $table->integer('type')->default(0); // 0 - svecias, 1 - paslaugu gavejas, 2 - paslaugu teikejas, 3- adminas, 4-modetatorius
            $table->string('name');
            $table->string('surname');
            $table->date('year_of_birth')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->default('https://icons-for-free.com/iconfiles/png/512/person+profile+user+icon-1320184018411209468.png');
            $table->string('gender')->nullable();
            $table->integer('points')->nullable();
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
