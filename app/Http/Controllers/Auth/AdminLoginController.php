<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }
    public function showLogin(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        
        // Validate the Form

        //Attemp to log the user in:
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if succesful, then return redirect intended location
            return redirect()->intended('admin');
        }
        //if unsuccessful, then redirect back to the login form with data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
