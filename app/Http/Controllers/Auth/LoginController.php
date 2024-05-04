<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index (){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => ['required'],
            'password'=>['required']
        ]);

        $user = User::where('username', $request->username)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return redirect('/login')->with('error', 'Email or Password is not valid !!');
        } else {
            Auth::login($user, false);
            return redirect('/');
        }
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
