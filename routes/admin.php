<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
/*
Route::get('/', function () {

    return view('admin.dashboard');

    // return view('admin.mangeReceptionist');
});
*/
Auth::routes();
Route::get('/', [adminController::class, 'dash'])->name('dashboard');
Route::get('/receptionist', [adminController::class, 'recep'])->name('rec');
Route::get('/rooms', [adminController::class, 'rooms'])->name('rooms');
Route::get('/floors', [adminController::class, 'floors'])->name('floors');
Route::get('/clients', [adminController::class, 'clients'])->name('clients');
Route::get('admin',[adminController::class, 'index']);

/*
Route::get('/receptionist', function () {

    return view('admin.mangeReceptionist');
});

Route::get('/rooms', function () {
    return view('admin.manageRooms');
});

Route::get('/floors', function () {
    return view('admin.manageFloors');
});
Route::get('/clients', function () {
    return view('admin.manageClients');
});
*/