<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusSchedulesBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedules_bookings', function (Blueprint $table) {
            $table->id();

            $table->string('seat_number');
            $table->double('price');
            $table->enum('status', ['cancel', 'active']);

            $table->unsignedBigInteger('bus_seat_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bus_schedule_id');

            $table->foreign('bus_seat_id')->references('id')->on('bus_seats');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bus_schedule_id')->references('id')->on('bus_schedules');

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
        Schema::dropIfExists('bus_schedules_bookings');
    }
}
