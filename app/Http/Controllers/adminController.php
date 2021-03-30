<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Room;
use App\Models\Manager;

use App\Models\Receptionist;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
use App\DataTables\AdminDatatable;
use Yajra\DataTables\Services\DataTable;

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
                ->addColumn('action', function($row){
                   // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" id="editManagers">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                   $actionBtn = '<button type="button" class="btn btn-success btn-sm" id="editManagers" data-id="'.$row->id.'">Edit</button> 
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
            //dd($data);
            return Datatables::of($data)
                ->addColumn('action', function($row){
                   // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" id="editManagers">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                   $actionBtn = '<button type="button" class="btn btn-success btn-sm" id="editManagers" data-id="'.$row->id.'">Edit</button> 
                   <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';

                   return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /*
    
    public function getManagers(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Manager::latest()->get();
            //dd($data);
            return Datatables::of($data)
                ->addColumn('action', function($row){
                   // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" id="editManagers">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                   $actionBtn = '<button type="button" class="btn btn-success btn-sm" id="editManagers" data-id="'.$row->id.'">Edit</button> 
                   <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';

                   return $actionBtn;
                })
                ->addColumn('avatar',function(){
                   return' <div class="image">
                            <img width="70" src="http://localhost:8000/storage/uploads/'.''.'" class="img-circle elevation-2" alt="User Image">
                            </div>';
                })
                ->rawColumns(['action','avatar'])
                ->make(true);
        }
    }
    
    */

    public function getReceptionists(Request $request)
    {
        if ($request->ajax()) {

            $data = Receptionist::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                  //  $actionBtn = '<a href="javascript:void(0)" name="edit" id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn = '<a href=" {{route('.'"receptionists.edit"'.')}}" name="edit" id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                   
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    /************ Update Receptionists **************/
    public function updateReceptionists(Request $request, Receptionist $receptionist )
    {
        $form_data = array(
            'username'    =>  $request->username,
            'email'     =>  $request->email,
        );

        Receptionist::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);

    }
    /************ Edit Receptionists  **************/
    public function editReceptionists($id)
    {
        if(request()->ajax())
        {
            $data = Receptionist::findOrFail($id);
           // return response()->json(['result' => $data]);
            $receptionistData =  response()->json(['result' => $data]);
            return view('receptionistEdit');
        }
    }


}