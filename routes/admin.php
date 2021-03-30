<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\adminController;

use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\ReceptionistsController;


/*
Route::get('/', function () {


    return view('admin.dashboard');

    // return view('admin.mangeReceptionist');
});*/

Auth::routes();
//test datatable admin route
Route::get('/admin', [adminController::class, 'index'])->name('index');

//we're using admin prefix for all those routes defined in routeServiceProvider.php for admin accout as following >> localhost:8000/admin/following_route_name
Route::get('/', [adminController::class, 'dash'])->name('dash');
Route::get('/receptionist', [adminController::class, 'recep'])->name('rec');

Route::get('/Manger', [adminController::class, 'managers'])->name('Managers');
Route::get('/managers/{manager}/edit', [adminController::class, 'managers_edit'])->name('managers.edit');
Route::get('/rooms', [adminController::class, 'rooms'])->name('rooms');
Route::get('/rooms/{room}/edit', [adminController::class, 'rooms_edit'])->name('rooms.edit');
Route::get('/floors', [adminController::class, 'floors'])->name('floors');
Route::get('/floors/{floor}/edit', [adminController::class, 'floors_edit'])->name('floors.edit');
Route::get('/clients', [adminController::class, 'clients'])->name('clients');
Route::get('/clients/{client}', [adminController::class, 'show'])->name('client.show');
Route::get('/clients/{client}/edit', [adminController::class, 'client_edit'])->name('client.edit');

Route::resource('managers', adminController::class);
Route::get('get-managers', [adminController::class, 'getManagers'])->name('managers.list');

Route::get('/receptionists', [adminController::class, 'getReceptionists'])->name('receptionist.list');

/*******Receptionist******/
Route::get('/receptionists', [adminController::class, 'getReceptionists'])->name('receptionist.list');
Route::get('/receptionists/{receptionists}/edit', [adminController::class, 'receptionists_edit'])->name('receptionists.edit');
Route::resource('adminManagers', AdminManagerController::class);
//Route::get('adminManagers/{id}/edit', [AdminManagerController::class, 'edit']);



