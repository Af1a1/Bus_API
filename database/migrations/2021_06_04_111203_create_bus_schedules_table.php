<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->id();

            $table->enum('direction', ['forward', 'revers']);
            $table->dateTime('start_timestamp');
            $table->dateTime('end_timestamp');

            $table->unsignedBigInteger('bus_route_id');

            $table->foreign('bus_route_id')->references('id')->on('bus_routes');

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
        Schema::dropIfExists('bus_schedules');
    }
}
