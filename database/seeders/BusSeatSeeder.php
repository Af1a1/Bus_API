<?php

namespace Database\Seeders;

use App\Models\BusSeats;
use Illuminate\Database\Seeder;

class BusSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Bus 1
        BusSeats::create([
           'bus_id'=>'1',
            'seat_number'=>'1',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'1',
            'seat_number'=>'2',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'1',
            'seat_number'=>'3',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'1',
            'seat_number'=>'4',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'1',
            'seat_number'=>'5',
            'price'=>'100'
        ]);

        // Bus 2
        BusSeats::create([
            'bus_id'=>'2',
            'seat_number'=>'1',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'2',
            'seat_number'=>'2',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'2',
            'seat_number'=>'3',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'2',
            'seat_number'=>'4',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'2',
            'seat_number'=>'5',
            'price'=>'100'
        ]);

        //Bus 3
        BusSeats::create([
            'bus_id'=>'3',
            'seat_number'=>'1',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'3',
            'seat_number'=>'2',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'3',
            'seat_number'=>'3',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'3',
            'seat_number'=>'4',
            'price'=>'100'
        ]);
        BusSeats::create([
            'bus_id'=>'3',
            'seat_number'=>'5',
            'price'=>'100'
        ]);

    }
}
