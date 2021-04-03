<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class AdminFloorController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Floor $floor)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $faker = Faker::create();
        Floor::insert([
            'floorId'=>$faker->unique()->numberBetween(1000, 9999),
            'name'=>$request['name'],
            'Manager'=>Auth::user()->name,
            'email'=>Auth::user()->email,

        ]);
        return response()->json(['success'=>'Floor added successfully']);
    }

    public function show(Floor $floor, $id)
    {
        $data = $floor->findData($id);
        $html = '
                <div class="form-group">
                    <h5>Floor ID:</h5>
                    <h6>'.$data->floorId.'</h6>
                </div>
                <div class="form-group">
                    <h5>Name:</h5>
                    <h6>'.$data->name.'</h6>
                </div>
                <div class="form-group">
                    <h5>Manager:</h5>
                    <h6>'.$data->Manager.'</h6>
                </div>
                ';
        return response()->json(['html'=>$html]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Receptionist $receptionist
    * @return \Illuminate\Http\Response
    */
    public function edit(Floor $floor, $id)
    {
        $data = $floor->findData($id);
        $html = '
                <div class="form-group">
                <label for="name">Floor Name:</label>
                <input type="text" class="form-control" name="name" id="editFloorName" value="'.$data->name.'">
                </div>
                ';


        return response()->json(['html'=>$html]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Receptionist $receptionist
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
          ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $floor = new Floor;
        $floor->updateData($id, $request->all());

        return response()->json(['success'=>'Floor updated successfully']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Manager  $manager
    * @param  \App\Models\Receptionist $receptionist
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
       /*
        $flag=0;
         $reqfloor=Floor::find($id)->first();
         $resultArray= Room::where('floor_number', $reqfloor['floorId'])->pluck('room_number')->all();
         foreach( $resultArray as $val) {
             if(Reservation::where('room_id',$val)->first())
            {     
                $flag=1; 
                  break;
            }
          } 
          if ($flag ==1)
          {
              $floor = new Floor();
            $floor->deleteData($id);
          }
       
       */
         $floor = new Floor();
         $floor->deleteData($id);
        return response()->json(['success'=>"Floor can't be deleted "]);
    }
}
