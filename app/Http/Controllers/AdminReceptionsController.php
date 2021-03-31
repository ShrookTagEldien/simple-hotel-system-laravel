<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Receptionist;
use Illuminate\Validation\Rule;

//use Illuminate\Validation\Validator;

class AdminReceptionsController extends Controller
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Receptionist $receptionist)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'NationalID' => ['required', 'unique:managers'],
            'email' =>  ['required', 'unique:managers'],
            'password' => ['required','min:6'],
            'avatar' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $receptionist->storeData($request->all());

        return response()->json(['success'=>'Receptionist added successfully']);
    }

  /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receptionist $receptionist
     * @return \Illuminate\Http\Response
     */
    public function show(Receptionist $receptionist)
    {
        //
    }



     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receptionist $receptionist
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptionist $receptionist,$id)
    {
        
        $data = $receptionist->findData($id);
        $html = '<div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" class="form-control" name="username" id="editUserName" value="'.$data->username.'">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" id="editEmail" value="'.$data->email.'">
                </div>
                <div class="form-group">
                    <label for="NationalID">National ID:</label>
                    <input type="text" class="form-control" name="NationalID" id="editNationalID" value="'.$data->NationalID.'">
                </div>';


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
            'username' => 'required',
            'NationalID' => 'required',
            'email' => 'required',

        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $receptionist = new Receptionist;
        $receptionist->updateData($id, $request->all());

        return response()->json(['success'=>'Receptionist updated successfully']);
   
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Receptionist $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $receptionist = new Receptionist;
        $receptionist->deleteData($id);

        return response()->json(['success'=>'Receptionist deleted successfully']);
    }




}
