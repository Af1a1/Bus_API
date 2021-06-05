<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusScheduleList;
use App\Http\Resources\UserBooking;
use App\Models\BusSchedules;
use App\Models\BusSchedulesBookings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
Use \Carbon\Carbon;

class UserController extends Controller
{
    /**
     * @param Request $request
     * User Registration Function
     */
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=> bcrypt($fields['password']),

        ]);

        $token = $user -> createToken('myapptoken') -> plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    /**
     * @param Request $request
     * User Login Function
     */
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
               'message' => 'Bad credential'
            ], 401);
        }

        $token = $user -> createToken('myapptoken') -> plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    /**
     * @param Request $request
     * @param $id
     * User Password & Email Reset Function
     */
    public function reset(Request $request, $id){

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|confirmed|string'
        ]);

        $input = $request->all();

        $input['email'] = $request['email'];
        $input['password'] = Hash::make($request['password']);

        User::find($id)->update($input);

        return response('Success', 201);

    }

    /**
     * @param Request $request
     * User Bus Schedule Booking Function
     */
    public function book_schedule(Request $request){

        $fields = $request->validate([
            'bus_seat_id' => 'required',
            'user_id' => 'required',
            'bus_schedule_id' => 'required',
            'seat_number' => 'required',
            'price' => 'required',
            'status' => 'required|in:cancel,active',
        ]);

        $book_schedule = BusSchedulesBookings::create([
            'bus_seat_id'=>$fields['bus_seat_id'],
            'user_id'=>$fields['user_id'],
            'bus_schedule_id'=>$fields['bus_schedule_id'],
            'seat_number'=>$fields['seat_number'],
            'price'=>$fields['price'],
            'status'=>$fields['status'],
        ]);

        $response = [
            'book_schedule' => $book_schedule,
        ];

        return response($response, 201);
    }

    /**
     *  Show Available Bookings Function
     */
    public function schedule_list(){

        return BusScheduleList::collection(BusSchedules::all());

    }

    /**
     * @param $id
     * Show All User Bookings Function
     */
    public function my_bookings($id){

        return UserBooking::collection(BusSchedulesBookings::where('user_id', $id)->get());
    }

    /**
     * @param Request $request
     * @param $id
     * Cancel User Booking Before 10 Hours Function
     */
    public function cancel_booking(Request $request, $id){

        $request->validate([
            'status' => 'required|string',
        ]);

        $input = $request->all();

        $input['status'] = $request['status'];

        $booking = BusSchedulesBookings::find($id);

        $date_created = BusSchedulesBookings::where('id', $id)->value('created_at');

        $date_now = Carbon::now();

        //$date_now_hour = Carbon::parse($date_now)->format('H');
        //$date_created_hour = Carbon::parse($date_created)->format('H');
        //$time_diff = $date_now_hour - $date_created_hour;

        $time_diff = $date_now->diffInHours($date_created);

        if($booking){
            if ($time_diff < 10){
                $booking->status= $input['status'];
                $booking->save();
            }else{
                return response([
                    'msg'=>'!Cancellation overdue'
                ]);
            }
        }

        return response([
            'success' => true,
            'booking' => $booking,
            'time_diff' => $time_diff,
        ], 201);
    }

}
