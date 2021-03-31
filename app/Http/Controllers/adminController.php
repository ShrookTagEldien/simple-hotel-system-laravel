<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AdminDatatable;
use App\Models\Manager;
use App\Models\Room;

use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

use App\Models\Receptionist;
use Validator;

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
   /* public function index(AdminDatatable $admin)
    {
        return $admin->render('admin.index');
    }

*/
     public function dash()

    {
        return view('admin.dashboard');
    }
    public function recep()
    {
        return view('admin.mangeReceptionist');
    }
    /*
    public function receps_edit()
    {
        return "edit recep";
    }*/
    public function managers()
    {
        return view('admin.manageManagers');
    }
    /*
    public function managers_edit()
    {
        return "edit manager";
    }*/

    public function rooms()
    {
        return view('admin.manageRooms');
    }

    /*
        public function rooms_edit()
        {
            return "edit room";
        }*/
    public function clients()
    {
        return view('admin.manageClients');
    }
    /*
    public function clients_edit()
    {
        return "edit client";
    }*/
    public function floors()
    {
        return view('admin.manageFloors');
    }/*
    public function floors_edit()
    {
        return "edit floor";
    }*/
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
                    // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" id="editManagers">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn = '<button type="button" class="btn btn-success btn-sm" id="editManagers" data-id="'.$row->id.'">Edit</button>
                   <button type="button" class="btn btn-info btn-sm" id="showManagers" data-id="'.$row->id.'">Show</button>
                   <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }



    public function getRooms(Request $request)
 {
 if ($request->ajax()) {
 
 $data = Room::latest()->get();
 
 return Datatables::of($data)
 ->addColumn('action', function($row){
 $actionBtn = '<button type="button" class="btn btn-secondary btn-sm" id="editManagers" data-id="'.$row->id.'">Edit</button> 
 <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
 
 return $actionBtn;
 })
 ->editColumn('price', function(Room $room) {
 return $room->price*0.01 . ' $';
 })
 ->addColumn('status', function(Room $room) {
 if($room->status=="available")
 return ('<font color="green"> '. $room->status .'</font>');
 else 
 return ('<font color="red"> '. $room->status .'</font>');
 
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
                    $actionBtn = '<button type="button" class="btn btn-success btn-sm" id="editReceptionists" data-id="'.$row->id.'">Edit</button>
                   <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


}
