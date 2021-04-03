<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\PendingClientsDataTable;
use App\DataTables\MyClientsDataTable;

use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;


class ReceptionistsController extends Controller
{
    //
    public function index()
    {
        view('receptionist.index');
    }

    public function getReceptionists(Request $request)
    {
        if ($request->ajax()) {

            $data = Receptionist::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
       // dd("inside rece controller");
    }


    public function getPendingClients(Request $request, User $user)
    {
        $data = $user->getPendingClients();
        return DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="approveClient" data-id="'.$data->id.'">Approve</button>
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#denyClientModal" class="btn btn-danger btn-sm" id="denyClient">Deny</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }
    //function that updates database when client is approved
    public function approve($id){
        $user=User::find($id);
        $user->update([
            'status' => 'approved',
            'receptionist_id'=> Auth::user()->id,
        ]);
        return response()->json(['success'=>'Client Approved']);
    }
    //function that updates database when client is denied
    public function deny($id){
        $user=User::find($id);
        $user->update([
            'status' => 'denied'
        ]);
        return response()->json(['success'=>'Client Denied']);
    }
    public function showMyClients()
    {
        $user=User::where('status' ,'approved');
        return DataTables::of($user);
        

    }
}

