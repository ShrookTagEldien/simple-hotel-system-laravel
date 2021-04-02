<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
  ///dd(Auth::user()->roles->first()->name);
	$role = Auth::user()->roles->first()->name;
	if($role == 'manager') {
		return view('manager.dashboard');
	}else if($role == 'admin'){
		return view('admin.dashboard');
	}
})->name('home');


/************************************************************** */
/*
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/superadmin_dashboard', function(){
      return view('admin.dashboard');
    })->name('super_admin_dashboard');
  });

  Route::group(['middleware' => ['role:user']], function () {
    Route::get('/user_dashboard', function(){
      return view('user_dashboard');
    })->name('user_dashboard');
  });  
*/

Route::get('/rooms', [RoomController::class, 'index'])->name('room.index');
Route::get('/rooms/create',[RoomController::class, 'create'])->name('room.create');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('room.show');
Route::post('/rooms',[RoomController::class, 'store'])->name('room.store');


Route::get('reservations/all',[ReservationsController::class, 'index'])->name('reservations.index');
Route::get('reservations',[ReservationsController::class,'index']);          //show available rooms
Route::get('reservations/{room}',[ReservationsController::class,'create'])->name('reservations.create');
Route::post('reservations',[ReservationsController::class, 'store'])->name('reservations.store');


Route::get('students', [StudentController::class, 'index']);
Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');

