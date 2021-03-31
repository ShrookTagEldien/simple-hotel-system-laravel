<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class managerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(AdminDatatable $admin)
    {
        return $admin->render('manager.index');
    }
    public function dash()
    {
        return view('manager.dashboard');
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
        return view('manager.manageRooms');
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

    /* public function getRooms(Request $request)
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

     public function getManagerReceptionists(Request $request)
     {
         if ($request->ajax()) {
             $data = Receptionist::latest()->get();
             return Datatables::of($data)

                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $actionBtn = '<button type="button" class="btn btn-success btn-sm" id="editReceptionists" data-id="'.$row->id.'">Edit</button>
                     <button type="button" class="btn btn-info btn-sm" id="showManagers" data-id="'.$row->id.'">Show</button>
                    <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                     return $actionBtn;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
     }*/
}
