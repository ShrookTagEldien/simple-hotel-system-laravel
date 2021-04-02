<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\managerController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\AdminReceptionsController;
use App\Http\Controllers\AdminFloorController;

Auth::routes();






/********** Tables listing data routes*************/
//Route::get('get-rooms', [managerController::class, 'getRooms'])->name('rooms.list');
//Route::get('/Receptionists', [managerController::class, 'getManagerReceptionists'])->name('managerReceptionist.list');

/*******CRUD operations routes ******/

Route::group(['middleware' => ['role:manager']], function () {
    Route::get('/manager_dashboard', function () {
        return view('manager.dashboard');
    })->name('manag_dashboard');

    //we're using admin prefix for all those routes defined in routeServiceProvider.php for admin accout as following >> localhost:8000/admin/following_route_name
    Route::get('/', [managerController::class, 'dash'])->name('dash');
    Route::get('/receptionist', [managerController::class, 'recep'])->name('rec');
    Route::get('/rooms', [managerController::class, 'rooms'])->name('rooms');
    Route::get('/floors', [managerController::class, 'floors'])->name('floors');
    Route::get('/clients', [managerController::class, 'clients'])->name('clients');

    /********** Tables listing data routes*************/
    //Route::get('get-rooms', [managerController::class, 'getRooms'])->name('rooms.list');
    //Route::get('/Receptionists', [managerController::class, 'getManagerReceptionists'])->name('managerReceptionist.list');

    /*******CRUD operations routes ******/

    Route::resource('adminReceptions', AdminReceptionsController::class);


    Route::resource('adminRooms', AdminRoomController::class);

    Route::resource('adminFloors', AdminFloorController::class);

    //Route::resource('adminFloors', managerFloorController::class);
});
