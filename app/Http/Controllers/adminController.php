<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Room;
use App\Models\User;

use App\Models\Manager;
use App\Models\Floor;
use Illuminate\Support\Facades\Auth;


use App\Models\Receptionist;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;


class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*public function index(AdminDatatable $admin)
    {
        return $admin->render('admin.index');
    }*/

    public function dash()
    {
        return view('admin.dashboard',[ 'managers'=> Manager::count(),
                                        'rooms'=> Room::where('status','rented')->count(),
                                        'available'=> intval(Room::avg('price'))*0.01,
                                        'reservations'=>'4037',
                                        'floors'=>Floor::count(),
                                        'clients'=>'9520'

                                        ]);
    }
    public function recep()
    {
        return view('admin.mangeReceptionist');
    }

    public function managers()
    {
        return view('admin.manageManagers');
    }


    public function rooms()
    {
        return view('admin.manageRooms',['floors'=>Floor::all()]);
    }


    public function clients()
    {
        return view('admin.manageClients');
    }

    public function floors()
    {
        return view('admin.manageFloors');
    }
    public function show()
    {
        return view('admin.clientShow');
    }

    public function getManagers(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Manager::latest()->get();
            //dd($data);
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $btnStyle= "";
                    if($row->banning=='Ban'){
                        $btnStyle='btn-success';
                    }
                    
                    $actionBtn = '<button type="button" class="btn btn-secondary btn-sm" id="editManagers" data-id="'.$row->id.'">Edit</button>
                   <button type="button" class="btn btn-info btn-sm" id="showManagers" data-id="'.$row->id.'">Show</button>
                   <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>
                   <button type="button" class="btn '.$btnStyle.' btn-sm border border-rounded" id="banManagers" data-id="'.$row->id.'">'.$row->banning.'</button>
                   ';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function getClients(Request $request)
    {
        
        if ($request->ajax()) {
            $data = User::where('role','client')->get();
            //dd($data);
            return Datatables::of($data)
                ->make(true);
        }
    }
    public function getRooms(Request $request)
    {
        if ($request->ajax()) {
            $data = Room::latest()->get();

            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button type="button" class="btn btn-secondary btn-sm" id="editManagers" data-id="'.$row->id.'">Edit</button>
                   <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';

                    return $actionBtn;
                })
                ->editColumn('price', function (Room $room) {
                    return  $room->price*0.01 . ' $';
                })
                ->addColumn('status', function (Room $room) {
                    if ($room->status=="available") {
                        return ('<font color="green"> '. $room->status .'</font>');
                    } else {
                        return ('<font color="red"> '. $room->status .'</font>');
                    }
                })


                ->rawColumns(['action','status'])
                ->make(true);
        }
    }



    public function getReceptionists(Request $request)
    {
        if ($request->ajax()) {
            $data = Receptionist::latest()->get();
            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnStyle= "";
                    if($row->banning=='Ban'){
                        $btnStyle='btn-success';
                    }
                    $actionBtn = '<button type="button" class="btn btn-secondary btn-sm" id="editReceptionists" data-id="'.$row->id.'">Edit</button>
                    <button type="button" class="btn btn-info btn-sm" id="showManagers" data-id="'.$row->id.'">Show</button>
                   <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>
                   <button type="button" class="btn '.$btnStyle.' btn-sm border border-rounded" id="banManagers" data-id="'.$row->id.'">'.$row->banning.'</button>
                   ';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getFloors(Request $request)
    {
        if ($request->ajax()) {
            $data = Floor::latest()->get();
            return Datatables::of($data)
                        ->addColumn('action', function ($row) {
                            if ($row->email === Auth::user()->email ||Auth::user()->role ==='admin') {
                                $actionBtn = '<button type="button" class="btn btn-secondary btn-sm" id="editFloor" data-id="'.$row->id.'">Edit</button>
                                <button type="button" class="btn btn-info btn-sm" id="showFloor" data-id="'.$row->id.'">Show</button>
                                <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                            } else {
                                $actionBtn = '
                                <button type="button" class="btn btn-secondary btn-sm" id="editFloor" disabled>Edit</button>
                                 <button type="button" class="btn btn-info btn-sm" id="showFloor" data-id="'.$row->id.'">Show</button>
                                 <button type="button" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId" disabled>Delete</button>';
                            }


                            return $actionBtn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
    }
}
