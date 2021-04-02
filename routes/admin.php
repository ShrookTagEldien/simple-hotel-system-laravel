<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminReceptionsController;
use App\Http\Controllers\AdminFloorController;
use  App\Http\Controllers\Auth\AdminLoginController;


Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/superadmin_dashboard', function(){
      return view('admin.dashboard');
    })->name('super_admin_dashboard');

        //we're using admin prefix for all those routes defined in routeServiceProvider.php for admin accout as following >> localhost:8000/admin/following_route_name
        Route::get('/', [adminController::class, 'dash'])->name('dash');
        Route::get('/receptionist', [adminController::class, 'recep'])->name('rec');

        Route::get('/Manger', [adminController::class, 'managers'])->name('Managers');
        //Route::get('/managers/{manager}/edit', [adminController::class, 'managers_edit'])->name('managers.edit');
        Route::get('/rooms', [adminController::class, 'rooms'])->name('rooms');

        //Route::get('/rooms/{room}/edit', [adminController::class, 'rooms_edit'])->name('rooms.edit');

        //Route::get('/floors/{floor}/edit', [adminController::class, 'floors_edit'])->name('floors.edit');
        Route::get('/clients', [adminController::class, 'clients'])->name('clients');
        Route::get('/clients/{client}', [adminController::class, 'show'])->name('client.show');

        Route::get('/clients/{client}/edit', [adminController::class, 'client_edit'])->name('client.edit');
        Route::get('/receptionists/{receptionists}/edit', [adminController::class, 'receptionists_edit'])->name('receptionists.edit');



        /********** Tables listing data routes*************/
        Route::resource('managers', adminController::class);
        Route::get('get-managers', [adminController::class, 'getManagers'])->name('managers.list');
        Route::get('get-rooms', [adminController::class, 'getRooms'])->name('rooms.list');
        Route::get('/receptionists', [adminController::class, 'getReceptionists'])->name('receptionist.list');

        /*******CRUD operations routes ******/



        /******* Receptionist ******/
        Route::get('/receptionists', [adminController::class, 'getReceptionists'])->name('receptionist.list');
        Route::resource('adminReceptions', AdminReceptionsController::class);

        Route::resource('adminManagers', AdminManagerController::class);
        Route::get('adminManager/{manager}/ban', [AdminManagerController::class,'banManager']);

        Route::resource('adminRooms', AdminRoomController::class);

        /******* Floor ******/
        Route::get('/floors', [adminController::class, 'floors'])->name('floors');
        Route::get('/get-floors', [adminController::class, 'getFloors'])->name('floor.list');
        Route::resource('adminFloors', AdminFloorController::class);


        /*******  */
        Route::get('/login',[AdminLoginController::class,'showLoginForm'])->name('admin.login'); 
        Route::post('/login',[AdminLoginController::class,'login'])->name('admin.login.submit'); 


        //================  Multi Authentication ====================//
            // Route::get('/login',[adminLoginController::class,'showLoginForm'])->name('admin.login'); 
            // Route::post('/login',[adminLoginController::class,'login'])->name('admin.login.submit'); 
            // Route::get('/',[adminController::class,'dash']);
        });

