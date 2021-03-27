<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AdminDatatable;

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
    public function index(AdminDatatable $admin)
    {
        return $admin->render('admin.index');
    }
   
     public function dash()
    {
        return view('admin.dashboard');
    }
    public function recep()
    {
        return view('admin.mangeReceptionist');
    }
    public function receps_edit()
    {
        return "edit recep";
    }
    public function managers()
    {
        return view('admin.manageManagers');
    }
    public function managers_edit()
    {
        return "edit manager";
    }

    public function rooms()
    {
        return view('admin.manageRooms');
    }


    public function rooms_edit()
    {
        return "edit room";
    }
    public function clients()
    {
        return view('admin.manageClients');
    }
    public function clients_edit()
    {
        return "edit client";
    }
    public function floors()
    {
        return view('admin.manageFloors');
    }
    public function floors_edit()
    {
        return "edit floor";
    }
    public function show()
    {
        return view('admin.clientShow');
    }
}
