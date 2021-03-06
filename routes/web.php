<?php

use App\DataTables\RoomDataTable;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\GreetClient;

use App\Http\Controllers\ReceptionistsController;

use  App\Http\Controllers\Auth\AdminLoginController;
use App\Models\Receptionist;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StripePaymentController;


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


Route::get('/home', function (RoomDataTable $dataTable) {
  ///dd(Auth::user()->roles->first()->name);
if(Auth::user()!=null){
    $role = Auth::user()->roles->first()->name;
 
    if ($role == 'manager') {

      
      return redirect()->route('manag_dashboard');

    } else if ($role == 'admin') {

      return redirect()->route('super_admin_dashboard');

    } else if ($role == 'client') {

          if (Auth::user()->status == 'approved')
            return $dataTable->render('rooms.index');
          else {
            return view('client.pending');
          }
    } else if ($role == 'recep'){
      return view('receptionist.pendingClients');

    }
}
else{
  return redirect()->route('login');
}
})->name('home');




Route::get('get-rooms', [ReservationController::class, 'getAvailableRooms'])->name('get-rooms');
Route::get('/rooms', [RoomController::class, 'index'])->name('room.index');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('room.create');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('room.show');
Route::post('/rooms', [RoomController::class, 'store'])->name('room.store');
Route::get('/rooms/{room}/rent', [ReservationController::class, 'store'])->name('reservation.store');



Route::get('reservations/all', [ReservationsController::class, 'index'])->name('reservation.list');
Route::get('clients/reservations/all', [UserController::class, 'getReservations'])->name('reservation.myClients');
Route::get('reservations', [ReservationsController::class, 'index']);          //show available rooms
Route::get('reservations/{room}', [ReservationsController::class, 'create'])->name('reservation.create');
Route::post('reservations', [ReservationsController::class, 'store'])->name('reservation.store');
Route::get('clients/approve', [ReceptionistsController::class, 'getPendingClients'])->name('get-pending');
Route::post('/clients/{client}/approve', [ReceptionistsController::class, 'approve'])->name('client.approve');
Route::get('/clients/{client}/deny', [ReceptionistsController::class, 'deny'])->name('client.deny');
Route::get("/client/{room}/rent",[StripePaymentController::class,'stripe']);


//================  Multi Authentication ====================//
/*Route::prefix('admin')->group(function(){

    Route::get('/login',[AdminLoginController::class,'showLoginForm'])->name('admin.login'); 
    Route::post('/login',[AdminLoginController::class,'login'])->name('admin.login.submit'); 
    Route::get('/',[adminController::class,'dash']);
});*/



Route::get('receptionist/all', [ReceptionistsController::class, 'index'])->name('receptionist.index');
Route::get('clients/pending', [ReceptionistsController::class, 'getPendingClients'])->name('receptionist.getPendingClients');
Route::get('receptionist/MyClients',[UserController::class, 'index'])->name('receptionist.approvedClients');
Route::get('receptionist/MyClientsReservations',[UserController::class, 'getReservations'])->name('receptionist.clientsReservations');


/*============================================================================*/

Route::get('genderReservationsChart',[ReceptionistsController::class, 'showGenderReservationsChart'])->name('genderReservationsChart');
Route::get('reservationsRevenueChart',[ReceptionistsController::class, 'showReservationsRevenueChart'])->name('reservationsRevenueChart');

//stripe routes

Route::post('room/rent/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
