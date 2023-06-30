<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::user()){
            return redirect()->intended('dashboard');
        }

        return view('login.view_login');
    }

    public function proses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $kredensial = $request->only('username', 'password');

        $checkUser = User::where('username', $request->username)->first();

        
        if (empty($checkUser)) {
            return back()->withErrors([
                'username' => 'Wrong username or password!'
            ])->onlyInput('username');
        }

        if(Auth::attempt($kredensial)){
            $request->session()->regenerate();

            $user = Auth::user();

            if($user){
                return redirect()->intended('/')->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Login Successfuly!'
                ]);
            }

            return redirect()->intended('/');
        }
        
        return back()->withErrors([
            'username' => 'Wrong username or password!'
        ])->onlyInput('username');
    }
}
