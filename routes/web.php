<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rooms', [RoomController::class, 'index'])->name('room.index');
Route::get('/rooms/create',[RoomController::class, 'create'])->name('room.create');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('room.show');
Route::post('/rooms',[RoomController::class, 'store'])->name('room.store');


Route::get('reservations/all',[ReservationsController::class, 'index'])->name('reservations.index');
Route::get('reservations',[ReservationsController::class,'index']);          //show available rooms
Route::get('reservations/{room}',[ReservationsController::class,'create'])->name('reservations.create');
Route::post('reservations',[ReservationsController::class, 'store'])->name('reservations.store');