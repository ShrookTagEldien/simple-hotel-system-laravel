<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\PendingClientsDataTable;
use App\DataTables\MyClientsDataTable;

use Yajra\DataTables\Services\DataTable;

class ReceptionistsController extends Controller
{
    //
    public function index(PendingClientsDataTable $dataTable)
    {
        //echo "dfff";
        // view('receptionist.index');
        return $dataTable->render('receptionist.pendingClients');
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

    public function showNonApprovedClients(PendingClientsDataTable $dataTable)
    {
        $user=User::where('status' ,'pending');
       // $AllNonApprovedClients = $user->getPendingClients();
        return DataTables::of($user);
        /*
        return view('Receptionist.nonapprovedClients', [
            'nonapprovedclients' => $AllNonApprovedClients,
          ]);*/

    }

    public function showMyClients()
    {
        $user=User::where('status' ,'approved');
        return DataTables::of($user);
        

    }
}

