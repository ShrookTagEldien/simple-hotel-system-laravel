<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminReceptionsController;
<<<<<<< HEAD




=======
>>>>>>> b465edf43db4fd4048c81f4552232a3a0d795076

Auth::routes();

//we're using admin prefix for all those routes defined in routeServiceProvider.php for admin accout as following >> localhost:8000/admin/following_route_name
Route::get('/', [adminController::class, 'dash'])->name('dash');
Route::get('/receptionist', [adminController::class, 'recep'])->name('rec');

Route::get('/Manger', [adminController::class, 'managers'])->name('Managers');
//Route::get('/managers/{manager}/edit', [adminController::class, 'managers_edit'])->name('managers.edit');
Route::get('/rooms', [adminController::class, 'rooms'])->name('rooms');
//Route::get('/rooms/{room}/edit', [adminController::class, 'rooms_edit'])->name('rooms.edit');
Route::get('/floors', [adminController::class, 'floors'])->name('floors');
//Route::get('/floors/{floor}/edit', [adminController::class, 'floors_edit'])->name('floors.edit');
Route::get('/clients', [adminController::class, 'clients'])->name('clients');
Route::get('/clients/{client}', [adminController::class, 'show'])->name('client.show');
<<<<<<< HEAD
Route::get('/clients/{client}/edit', [adminController::class, 'client_edit'])->name('client.edit');
Route::get('/receptionists/{receptionists}/edit', [adminController::class, 'receptionists_edit'])->name('receptionists.edit');
=======
//Route::get('/clients/{client}/edit', [adminController::class, 'client_edit'])->name('client.edit');
//Route::get('/receptionists/{receptionists}/edit', [adminController::class, 'receptionists_edit'])->name('receptionists.edit');
>>>>>>> b465edf43db4fd4048c81f4552232a3a0d795076

/********** Tables listing data routes*************/
Route::resource('managers', adminController::class);
Route::get('get-managers', [adminController::class, 'getManagers'])->name('managers.list');
Route::get('get-rooms', [adminController::class, 'getRooms'])->name('rooms.list');
Route::get('/receptionists', [adminController::class, 'getReceptionists'])->name('receptionist.list');

/*******CRUD operations routes ******/



/*******Receptionist******/
Route::get('/receptionists', [adminController::class, 'getReceptionists'])->name('receptionist.list');

Route::resource('adminReceptions', AdminReceptionsController::class);

Route::resource('adminManagers', AdminManagerController::class);
Route::resource('adminRooms', AdminRoomController::class);
<<<<<<< HEAD



=======
>>>>>>> b465edf43db4fd4048c81f4552232a3a0d795076
