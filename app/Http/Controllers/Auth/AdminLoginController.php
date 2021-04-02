<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Auth;


class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    /*public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function showLoginForm(){
        return view('auth.admin-login');
    }*/

    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      
     // Attempt to log the user in
     //if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' =>Hash::make( $request->password)], $request->remember)) {
        //if (auth('admins')::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
    // return redirect()->intended(route('admin.dashboard'));}

   /*   $credentials = [
        'username' => session('username'),
        'password' => session('password'),
    ];*/
   // $input = $request->only("email", "password");
     // if(Auth::guard('admin')->attempt($credentials)) {
       //   if(Auth::guard('admin')->attempt($credentials)){
  //  if (auth('admins')->attempt($input) )
  //  { return  redirect()->route('dashboard'); }     
  

       }

 

    }