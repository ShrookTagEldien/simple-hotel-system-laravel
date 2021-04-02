<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'floorId' => 'required',
            'Manager' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        Floor::insert([
            'floorId'=>$request['floorId'],
            'name'=>$request['name'],
            'Manager'=>$request['Manager'],

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
                    <label for="floorid">Floor ID:</label>
                    <input type="text" class="form-control" name="floorid" id="editFloorId" value="'.$data->floorId.'">
                </div>
                <div class="form-group">
                <label for="name">Floor Name:</label>
                <input type="text" class="form-control" name="name" id="editFloorName" value="'.$data->name.'">
                </div>
                <div class="form-group">
                <label for="manager">Floor Manager:</label>
                <input type="text" class="form-control" name="manager" id="editFloorManager" value="'.$data->Manager.'">
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
            'floorId' => 'required',
            'Manager' => 'required',
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
        $floor = new Floor();
        $floor->deleteData($id);

        return response()->json(['success'=>'Floor deleted successfully']);
    }
}
