<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Room;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
use App\DataTables\AdminDatatable;
use Yajra\DataTables\Services\DataTable;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Room $room)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => ['required','unique:rooms'],
            'floor_number' => 'required',
            'manager_name' =>  ['required'],
            'capacity' => 'required',
            'price' => 'required',
        ]);    

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $room->storeData($request->all());

        return response()->json(['success'=>'Room added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room,$id)
    {
        $room = new Room;
        $data = $room->findData($id);
        $html = '
        <div class="form-group">
            <label for="number">Room Number:</label>
            <input type="text" class="form-control" name="number" id="createNumber" value="'.$data->room_number.'">
        </div>
        <div class="form-group">
            <label for="capacity">Room Capacity:</label>
            <input type="text" class="form-control" name="capacity" id="createCapacity" value="'.$data->capacity.'">
        </div>
        <div class="form-group">
            <label for="price">Room Price:</label>
            <input type="text" class="form-control" name="price" id="createPrice" value="'.$data->price.'">
        </div>
        <div class="form-group">
            <label for="floor">Floor Number:</label>
            <input type="text" class="form-control" name="floor" id="createFloor" value="'.$data->floor_number.'">
        </div>
        <div class="form-group">
            <label for="manager">Manager Name:</label>
            <input type="text" class="form-control" name="manager" id="createManager" value="'.$data->manager_name.'">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" name="status" id="createStatus" value="'.$data->status.'">
        </div>
        ';


        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {/*
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'NationalID' => 'required',
            'email' => 'required',

        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
*/
        $room = new Room;
        $room->updateData($id, $request->all());

        return response()->json(['success'=>'Room updated successfully']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $room = new Room;
        $room->deleteData($id);

        return response()->json(['success'=>'Room deleted successfully']);
    }
}
