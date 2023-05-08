<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequests;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function store(CreateUserRequests $request)
    {
        $user = User::create($request->all());

        $user->roles()->sync($request->roles);
        return to_route('login')->with('status','Account created!');
    }
    public function create(){
        $roles = Role::all();
    
        return view('auth.register',compact('roles'));
    }

}
