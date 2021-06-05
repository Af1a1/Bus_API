<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SuperAdmin::create([
           'name'=>'Aflal',
           'email'=>'aflal@gmail.com',
           'password'=>Hash::make('aflal123')
        ]);
        SuperAdmin::create([
            'name'=>'Nipun',
            'email'=>'nipun@gmail.com',
            'password'=>Hash::make('nipun123')
        ]);
        SuperAdmin::create([
            'name'=>'Madushi',
            'email'=>'madushi@gmail.com',
            'password'=>Hash::make('madushi123')
        ]);
    }
}
