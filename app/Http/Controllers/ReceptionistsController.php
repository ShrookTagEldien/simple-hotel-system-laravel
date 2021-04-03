<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Receptionist;
use App\Models\Reservation;
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
                    <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#denyClientModal" class="btn btn-danger btn-sm" id="denyClient">Deny</button>
                    <button type="button" class="btn btn-success btn-sm" id="approveClient" data-id="'.Auth::user()->id.'" hidden></button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }
    //function that updates database when client is approved
    public function approve($id){
        
        $user=User::where('id',$id);
        $user->update([
            'status' => 'approved'
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

    public function showGenderReservationsChart()
    {
       
        $MaleClients = User::join('Reservations', 'Reservations.user_id', '=', 'Users.id')
            ->where('Users.gender' ,'male')
            ->count();

        $FemaleClients = User::join('Reservations', 'Reservations.user_id', '=', 'Users.id')
            ->where('Users.gender' ,'female')
            ->count();

        return view('genderReservationsChart', [
                'MaleClients' => $MaleClients,
                'FemaleClients' => $FemaleClients,
            ]);
        
    }

    public function showReservationsRevenueChart()
    {
       
        $January = Reservation::whereMonth('date', '01')
                                ->sum('paid_price');
        $February = Reservation::whereMonth('date', '02')
                                ->sum('paid_price');
        $March = Reservation::whereMonth('date', '03')
                                ->sum('paid_price');
        $April  = Reservation::whereMonth('date', '04')
                                ->sum('paid_price');
        $May = Reservation::whereMonth('date', '05')
                                ->sum('paid_price');
        $June  = Reservation::whereMonth('date', '06')
                                ->sum('paid_price');
        $July = Reservation::whereMonth('date', '07')
                                ->sum('paid_price');
        $August = Reservation::whereMonth('date', '08')
                                ->sum('paid_price');
        $September = Reservation::whereMonth('date', '09')
                                ->sum('paid_price');
        $October = Reservation::whereMonth('date', '10')
                                ->sum('paid_price');
        $November = Reservation::whereMonth('date', '11')
                                ->sum('paid_price');
        $December  = Reservation::whereMonth('date', '12')
                                ->sum('paid_price');
        
        
        
        
                                
        return view('reservationsRevenueChart', [
                
                'January' => $January,
                'February' => $February,
                'March' => $March,
                'April' => $April,
                'May' => $May,
                'June' => $December ,
                'July' => $July,
                'August' => $August,
                'September' => $September ,
                'October' => $October,
                'November' => $November,
                'December' => $December ,
                
            ]);
        
    }

}

