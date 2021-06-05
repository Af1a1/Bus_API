<?php

namespace Database\Seeders;

use App\Models\Routes;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Routes::create([
           'node_one' => 'Colombo',
           'node_two' => 'Kandy',
           'route_number' => '*1',
           'distance' => '120km',
           'time' => '2hours',
        ]);
        Routes::create([
            'node_one' => 'Colombo',
            'node_two' => 'Kegalle',
            'route_number' => '1-1',
            'distance' => '140km',
            'time' => '2 hours 30 min',
        ]);
        Routes::create([
            'node_one' => 'Colombo',
            'node_two' => 'Mawanella',
            'route_number' => '1-2',
            'distance' => '90km',
            'time' => '1 hours 35 min',
        ]);
    }
}
