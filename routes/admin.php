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
Route::get('/receps/{recep}/edit', [App\Http\Controllers\adminController::class, 'receps_edit'])->name('receps.edit');
Route::get('/Manger', [App\Http\Controllers\adminController::class, 'managers'])->name('Managers');
Route::get('/managers/{manager}/edit', [App\Http\Controllers\adminController::class, 'managers_edit'])->name('managers.edit');
Route::get('/rooms', [App\Http\Controllers\adminController::class, 'rooms'])->name('rooms');
Route::get('/rooms/{room}/edit', [App\Http\Controllers\adminController::class, 'rooms_edit'])->name('rooms.edit');
Route::get('/floors', [App\Http\Controllers\adminController::class, 'floors'])->name('floors');
Route::get('/floors/{floor}/edit', [App\Http\Controllers\adminController::class, 'floors_edit'])->name('floors.edit');
Route::get('/clients', [App\Http\Controllers\adminController::class, 'clients'])->name('clients');
Route::get('/clients/{client}', [App\Http\Controllers\adminController::class, 'show'])->name('client.show');
Route::get('/clients/{client}/edit', [App\Http\Controllers\adminController::class, 'client_edit'])->name('client.edit');



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
