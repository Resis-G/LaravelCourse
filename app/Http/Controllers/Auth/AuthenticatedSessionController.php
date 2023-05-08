<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticatedSessionRequests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials=$request->validate([
            'email' =>['required'],
            'password'=>['required']
        ]);
        if(! Auth::attempt($credentials)){
            //LoginFail

            throw ValidationException::withMessages([
                'email'=>__('auth.failed')
            ]);
            
        }; 
        //LoginSuccess
        $request->session()->regenerate();

        return redirect()->intended()->with('status','haz iniciado sesion');
    }
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status','Ya se ha cerrado la sesion');
    }
}
