<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bus::create([
           'name'=>'176',
           'type'=>'Single-decker',
           'vehicle_number'=>'BC-123',
        ]);
        Bus::create([
            'name'=>'140',
            'type'=>'Single-decker',
            'vehicle_number'=>'BC-223',
        ]);
        Bus::create([
            'name'=>'155',
            'type'=>'Single-decker',
            'vehicle_number'=>'BC-323',
        ]);
    }
}
