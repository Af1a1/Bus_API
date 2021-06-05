<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public Routes User
Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);

//Public Routes Admin
Route::post('/admin/login', [AdminController::class, 'login']);



// Protected Routes User
Route::group(['middleware' => ['auth:sanctum']], function () {

    //User
    Route::put('/user/reset/{id}', [UserController::class, 'reset']);
    Route::post('/user/book', [UserController::class, 'book_schedule']);
    Route::put('/user/book/{id}', [UserController::class, 'cancel_booking']);
    Route::get('/user/schedule', [UserController::class, 'schedule_list']);
    Route::get('/user/book/{id}', [UserController::class, 'my_bookings']);

});

// Protected Routes Admins
Route::group(['middleware' => ['auth:admins']], function () {

    //Admin
    Route::put('/admin/reset/{id}', [AdminController::class, 'reset']);
    Route::post('/admin/map', [AdminController::class, 'mapping']);
    Route::post('/admin/bus', [AdminController::class, 'add_bus']);
    Route::post('/admin/routes', [AdminController::class, 'add_routes']);
    Route::delete('/admin/bus/{id}', [AdminController::class, 'delete_Bus']);
    Route::delete('/admin/routes/{id}', [AdminController::class, 'delete_Route']);
    Route::post('/admin/schedules', [AdminController::class, 'schedules']);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
