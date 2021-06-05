<?php

namespace Database\Seeders;

use App\Models\Routes;
use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Please Uncomment and Run this seeders to get database values
     * Note: Run Bus seeder before Bus Seat seeder
     * 1 - Run Admin Seeder
     * 2 - Run Bus Seeder
     * 3 - Run Bus Seat Seeder
     * 4 - Run Route Seeder
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(BusSeeder::class);
        $this->call(BusSeatSeeder::class);
        $this->call(RouteSeeder::class);

    }
}
