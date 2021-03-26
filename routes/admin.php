<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {

    return view('admin.dashboard');

    // return view('admin.mangeReceptionist');
});
*/
Auth::routes();
Route::get('/', [App\Http\Controllers\adminController::class, 'dash'])->name('dashboard');
Route::get('/receptionist', [App\Http\Controllers\adminController::class, 'recep'])->name('rec');
Route::get('/rooms', [App\Http\Controllers\adminController::class, 'rooms'])->name('rooms');
Route::get('/floors', [App\Http\Controllers\adminController::class, 'floors'])->name('floors');
Route::get('/clients', [App\Http\Controllers\adminController::class, 'clients'])->name('clients');


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