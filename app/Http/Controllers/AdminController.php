<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusRoutes;
use App\Models\BusSchedules;
use App\Models\Routes;
use App\Models\SuperAdmin;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * Admin Login Function
     */
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|required|string'
        ]);

        $admin = SuperAdmin::where('email', $fields['email'])->first();

        error_log($admin);

        if (!$admin || !Hash::check($fields['password'], $admin->password)) {
            return response([
                'message' => 'Bad credential'
            ], 401);
        }

        $token = $admin->createToken('myapptoken')->plainTextToken;

        $response = [
            'admin' => $admin,
            'token' => $token
        ];

        return response($response, 201);
    }


    /**
     * @param Request $request
     * @param $id
     * Admin Password & Email Reset Function
     */
    public function reset(Request $request, $id){

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|confirmed|string'
        ]);

        $input = $request->all();

        $input['email'] = $request['email'];
        $input['password'] = Hash::make($request['password']);

        SuperAdmin::find($id)->update($input);

        return response('Success', 201);
    }

    /**
     * @param Request $request
     * Admin Bus Route Mapping Function
     * Run seeder
     */
    public function mapping(Request $request){
        $fields = $request->validate([
            'bus_id' => 'required',
            'route_id' => 'required',
            'status' => 'required|in:active,blocked'
        ]);

        $map = BusRoutes::create([
           'bus_id'=> $fields['bus_id'],
           'route_id'=> $fields['route_id'],
           'status'=> $fields['status'],
        ]);

        $response = [
            'map' => $map
        ];

        return response($response, 201);

    }

    /**
     * @param Request $request
     * Admin Add Schedule Function
     */
    public function schedules(Request $request){
        $fields = $request->validate([
            'bus_route_id' => 'required',
            'direction' => 'required|in:forward,revers',
            'start_timestamp' => 'required',
            'end_timestamp' => 'required',
        ]);

        $schedule = BusSchedules::create([
            'bus_route_id' => $fields['bus_route_id'],
            'direction' => $fields['direction'],
            'start_timestamp' => $fields['start_timestamp'],
            'end_timestamp' => $fields['end_timestamp']
        ]);

        $response = [
            'schedule' => $schedule
        ];

        return response($response, 201);

    }

    public function add_bus(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'vehicle_number' => 'required',
        ]);

        $bus = Bus::create([
            'name' => $fields['name'],
            'type' => $fields['type'],
            'vehicle_number' => $fields['vehicle_number'],
        ]);

        $response = [
            'bus' => $bus
        ];

        return response($response, 201);

    }

    public function add_routes(Request $request){
        $fields = $request->validate([
            'node_one' => 'required',
            'node_two' => 'required',
            'route_number' => 'required',
            'distance' => 'required',
            'time' => 'required',
        ]);

        $route = Routes::create([
            'node_one' => $fields['node_one'],
            'node_two' => $fields['node_two'],
            'route_number' => $fields['route_number'],
            'distance' => $fields['distance'],
            'time' => $fields['time'],
        ]);

        $response = [
            'route' => $route
        ];

        return response($response, 201);

    }

    public function delete_Bus($id){
        return Bus::destroy($id);
    }

    public function delete_Route($id){
        return Routes::destroy($id);
    }

    /**
     * Please run seeders
     */
}
