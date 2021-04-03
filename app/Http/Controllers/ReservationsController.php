<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\DataTables\ReservationsDataTable;




class ReservationsController extends Controller
{

    public function index(){
        $userStatus=Auth::user()->status;
        if($userStatus=='approved')
             return view('reservations.index',['user'=>Auth::user()]);
        return view('client.pending');
    }

    public function create(Room $room){
        $userStatus=Auth::user()->status;
        if($userStatus=='approved')
          return view('reservations.create',['user'=>Auth::user(),'room'=>$room]);
        else view('client.pending');

    }
    public function getAvailableRooms(Request $request, Room $room)
    {
        $userStatus=Auth::user()->status;
        if($userStatus=='pending')
             return view('client.pending');
        $data = $room->getAvailableRooms();
        return DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="rent" data-id="'.$data->id.'">Rent</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }
    public function store(ReservationRequest $request)
    {
        $userStatus=Auth::user()->status;
        if($userStatus=='pending')
             return view('client.pending');
        $data=$request->all();
        $room=Room::where('id',$data['id'])->first();
        $capacity=$room->capacity;
        $validator = Validator::make($data, [
            'accompanies' => "max:$capacity",
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        else{
            $room->update(['status' => 'rented']);
            Reservation::create([
            'room_num' =>$room->room_number,
            'accompany_number' => $data['accompanies'],
            'paid_price' => $room->price,
            'room_id' => $room->id,
            'user_id' => Auth::user()->id
        ]);
        
       

            return response()->json(['success'=>'You Will Be redirected to the check out page shortly.']);
        }
    }
}
