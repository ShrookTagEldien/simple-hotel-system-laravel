<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
//use Illuminate\Validation\Validator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminManagerController extends Controller
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
    public function store(Request $request, Manager $manager)
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

        $manager->storeData($request->all());
        //$this->storeAvatar($manager);
        /*
        $create_user=new User;
        $create_user->name=$request->username;
        $create_user->password=$request->pass;
        $create_user->email=$request->email;
        $create_user->save();
        */
        return response()->json(['success'=>'Manager added successfully']);
    }

    public function StoreAvatar($user)
    {
        $user->update([
            'avatar'=> $user->avatar->store('uploads', 'public')
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager, $id)
    {
        $manager = new Manager;
        $data = $manager->findData($id);
        $html = '
                <div class="form-group">
                    <h5>User Name:</h5>
                    <h6>'.$data->username.'</h6>
                </div>
                <div class="form-group">
                    <h5>Email:</h5>
                    <h6>'.$data->email.'</h6>
                </div>
                <div class="form-group">
                    <h5>National ID:</h5>
                    <h6>'.$data->NationalID.'</h6>
                </div>';


        return response()->json(['html'=>$html]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager, $id)
    {
        $manager = new Manager;
        $data = $manager->findData($id);
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
     * @param  \App\Models\Manager  $manager
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

        $manager = new Manager;
        $manager->updateData($id, $request->all());

        return response()->json(['success'=>'Manager updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manager = new Manager;
        $manager->deleteData($id);

        return response()->json(['success'=>'Manager deleted successfully']);
    }
}
