<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;

class RoomController extends Controller
{
    public function create(Request $request)
    {
        $room = new Room;
        $room->room_number = $request->room_number;
        $room->capacity=$request->capacity;
        $room->price=$request->price;
        $room->status=0;
        $room->save();

        return redirect('rooms');
    }

    public function store(Request $request)
    {
        $room = new Room;
        $room->room_number = $request->room_number;
        $room->capacity=$request->capacity;
        $room->price=$request->price;
        $room->status=0;
        $room->save();

        return redirect('rooms');
    }

    public function edit($id)
    {
        $room = Room::find($id);
        $users= User::all();
        return view('rooms.edit', [
       'room'=>$room,
       'users'=>$users
       ]);
    }

    public function update(Request $request, Room $room)
    {
        $new_room = $request->only(['room_number', 'capacity','price']);
        $room->update($new_room);
        return redirect('/rooms');
    }

    public function destroy(Room $room)
    {
        if ($room->status == 0) {
            $room->delete();
            return "true";
        } else {
            return "false";
        }
    }
}
