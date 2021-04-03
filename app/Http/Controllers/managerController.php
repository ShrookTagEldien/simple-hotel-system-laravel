<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class managerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*public function index(AdminDatatable $admin)
    {
        return $admin->render('manager.index');
    }*/
    public function dash()
    {
        return view('manager.dashboard',[ 'availableRooms'=> Room::where('status','available')->count(),
                                        'rooms'=> Room::where('status','rented')->count(),
                                        'available'=> intval(Room::avg('price'))*0.01,
                                        'reservations'=>'4037',
                                        'floors'=>Floor::count(),
                                        'clients'=>'9520'

                                        ]);
    }
    public function recep()
    {
        return view('manager.mangeReceptionist');
    }

    public function managers()
    {
        return view('manager.manageManagers');
    }


    public function rooms()
    {
        return view('manager.manageRooms',['floors'=>Floor::all()]);
    }


    public function clients()
    {
        return view('manager.manageClients');
    }

    public function floors()
    {
        return view('manager.manageFloors');
    }
    public function show()
    {
        return view('manager.clientShow');
    }

}
