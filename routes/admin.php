<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashBoard');
    // return view('admin.mangeReceptionist');
});

Route::get('/receptionist', function () {
    return view('admin.mageReceptionist');
});
