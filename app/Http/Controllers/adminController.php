<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dash()
    {
        return view('admin.dashboard');
    }
    public function recep()
    {
        return view('admin.mangeReceptionist');
    }
    public function rooms()
    {
        return view('admin.manageRooms');
    }
    public function clients()
    {
        return view('admin.manageClients');
    }
    public function floors()
    {
        return view('admin.manageFloors');
    }
}
