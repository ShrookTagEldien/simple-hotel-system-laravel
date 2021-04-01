<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Validator;



class ReservationsController extends Controller
{
    public function index(){
        return view('reservations.index',['user'=>Auth::user()]);
    }

    public function create(Room $room){
        return view('reservations.create',['user'=>Auth::user(),'room'=>$room]);

    }
    public function store(Request $request)
    {
       
        $data=$request->all();
        $room=Room::where('id',$data['id'])->first();
        $capacity=$room->capacity;
        $validator = Validator::make($data, [
            'accompanies' => "max:3",
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
        
       

            return response()->json(['success'=>'Article added successfully']);
        }
    }
    public function get_available_rooms()
    {
        $AvailableRooms = Room::all()->where('status',1);
        
    }
}
