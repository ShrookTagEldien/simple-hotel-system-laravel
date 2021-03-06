<?php

namespace App\Http\Controllers;

//use Validator;

use App\Models\Room;
use App\Models\Floor;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\DataTables\AdminDatatable;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Validator;


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
           // 'manager_name' =>  ['required'],
            'capacity' => 'required',
            'price' => 'required',
        ]);    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
       // $room->storeData($request->all());
        Room::create([
            'room_number'=>$request['room_number'],
            'floor_number'=>$request['floor_number'],
            'capacity'=>$request['capacity'],
            'status'=>$request['status'],
            'price'=>$request['price'],
            'manager_name'=>Auth::user()->name,
            

        ]);

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
        $floors=Floor::all();
        $string= "";
         foreach($floors as $floor){
            $string.= '<option value="'.$floor['floorId'].'" id="createFloor">'.$floor['floorId'].'</option>';
            }
        $room = new Room;
        $data = $room->findData($id);
        if($data->status=='available'){
            $available='checked="checked"';
            $rented='';
        }
        else{
            $rented='checked="checked"';
            $available='';
        }
        $html = '
        <div class="row">
        <div class="col-6 m-0">
            <div class="form-group">
                <label for="number"class="text-dark">Room Number:</label>
                <input type="text" class="form-control" name="number" id="createNumber" value="'.$data->room_number.'">
            </div>
                <div class="form-group">
                <label for="capacity"class="text-dark">Room Capacity:</label>
                <input type="text" class="form-control" name="capacity" id="createCapacity" value="'.$data->capacity.'">
            </div>
            <div class="form-group">
                <label for="price"class="text-dark">Room Price:</label>
                <input type="text" class="form-control" name="price" id="createPrice" value="'.$data->price.'">
            </div>
        </div>
        <div class="col-6 m-0">
            <div class="form-group">
                <label for="floor"class="text-dark">Floor Number:</label>
                <select id="floor" name="floor" class="form-control">'
                .$string.'
                </select>   
            </div>
        
            <div class="form-group">
              <label for="status"class="text-dark">Status:</label>   <br/>
                  <input type="radio" name="status"  value="available"'.$available.'checked="checked"'.'> Available &nbsp;
                  <input type="radio"  name="status"  value="rented"'.$rented.'> Rented
            </div>
            
        </div> </div>
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
    {
        $room = new Room;
       /* Room::where('id', $id)->update(['room_number'=>$request['room_number'],
        'floor_number'=>$request['floor_number'],
        'capacity'=>$request['capacity'],
        'status'=>$request['status'],
        'price'=>$request['price'],
        //'manager_name'=>Auth::user()->name]
         ] );*/
         //$room->Auth::user()->name;
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

        if(!Reservation::where('room_id',$id)->first()){
            
            $room->deleteData($id);
            return response()->json(['success'=>'Room deleted successfully']);

        }
        else{

            return response()->json(['failure'=>'this room can not be deleted becuase it has reservation']);

        }
    }
}
