<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
    // return view('admin.mangeReceptionist');
});

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