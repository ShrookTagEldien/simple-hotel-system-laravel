<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;


class ReservationsController extends Controller
{
    public function index(){
        return view('reservations.index',['user'=>Auth::user()]);
    }

    public function create(Room $room){
        return view('reservations.create',['user'=>Auth::user(),'room'=>$room]);

    }
    public function store( ReservationRequest $request)
    {

        $room=Room::where('id',$request->id)->first();
        Reservation::create([
            'room_id' => $request->id,
            'room_num' =>$request->room_num,
            'accompany_number' => $request->accompany_number,
            'paid_price' => $room->price,
            'user_id' => Auth::user()->id
        ]);
        Room::where('id',$request->id)->update(['status' => 0]);
        return redirect('/reservations/all');
    }
    public function get_available_rooms()
    {
        $AvailableRooms = Room::all()->where('status',1);
        
    }
}
