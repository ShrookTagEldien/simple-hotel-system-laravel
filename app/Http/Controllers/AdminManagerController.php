<?php

namespace App\Http\Controllers;
use App\Models\Manager;
use Illuminate\Http\Request;
use App\Models\User;
//use Illuminate\Validation\Validator;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            //'avatar' => 'required',
            //'avatar' =>  'required|image|mimes:jpg,jpeg',
        ]);




        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        //$this->storeAvatar($manager);                

        $manager->storeData($request->all());

        User::create([
            'name' => $request['username'],
            'email' =>$request['email'],
            'password' => Hash::make($request['password']),
            'avatar'=>$request['avatar'],
            'country'=>'-',
            'gender'=>'-',
            'phone'=>'-',
            'remember_token' =>NULL,
            'status'=>'active',
            'role'=> 'manager'    
        ]); 

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
        $record= $manager-> findData($id);
        User::where('email',$record->email)->update(array('name' => $request['username'],'email'=>$request['email']));

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
        $record= $manager->findData($id);
        $manager->deleteData($id);      
        User::where('email',$record->email)->delete();
        return response()->json(['success'=>'Manager deleted successfully']);
    }

    public function banManager($id)
    {
        $manager = new Manager;
        $record= $manager->findData($id);
        if(User::where('email',$record->email)->first()){
            User::where('email',$record->email)->delete();
            Manager::where('id',$id)->update(array('banning' => 'Unban'));
            return response()->json(['success'=>'banned']);
        }
        else{

            User::create([
                'name' => $record['username'],
                'email' =>$record['email'],
                'password' => Hash::make($record['password']),
                'avatar'=>$record['avatar'],
                'country'=>'-',
                'gender'=>'-',
                'phone'=>'-',
                'remember_token' =>NULL,
                'status'=>'active',
                'role'=> 'manager'    
            ]);
            Manager::where('id',$id)->update(array('banning' => 'Ban'));

            return response()->json(['success'=>'unbanned']);
        }
        

    }


    
}
