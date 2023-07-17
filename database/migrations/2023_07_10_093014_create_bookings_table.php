<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('ord_id')->nullable();
            $table->string('table_no')->nullable();
            $table->string('table_amount')->nullable();
            $table->date('date');
            $table->time('timeslot');
            $table->string('name');
            $table->string('email');
            $table->string('items')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('payment_status')->default(false);
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
        Schema::dropIfExists('bookings');
    }
}
