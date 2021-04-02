<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('create:admin {--name=} {--password=}', function ($name, $password) {
    // $this->info('create new admin command '.$name .$password);
    $admin = new Admin();
    $admin->job_title='admin';
    $admin->email=$name;
    //store password hashed inside database
    $admin->password=Hash::make($password);
    $admin->save();
    User::create([
        'name' => $name,
        'email' =>$name,
        'password' => Hash::make($password),
        'avatar'=>'img.png',
        'country'=>'-',
        'gender'=>'-',
        'phone'=>'-',
        'remember_token' =>null,
        'status'=>'active',
        'role'=> 'admin'
    ]);
    $this->info('New Admin : '.$name ." is created");
})->purpose('Create new Admin command');
