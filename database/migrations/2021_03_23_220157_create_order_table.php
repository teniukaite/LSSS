<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->dateTime('order_date')->nullable();
            $table->double('price')->nullable();
            $table->string('comment')->nullable();
            $table->integer('fk_client_id')->nullable();
            $table->integer('fk_freelancer_id')->nullable();
            $table->integer('fk_project_id')->nullable();
            $table->integer('fk_service_id')->nullable();
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
        Schema::dropIfExists('order');
    }
}
