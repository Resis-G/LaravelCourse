<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function __construct()
    {
        $this->middleware('auth',['except'=>['show','create']]);
        $this->middleware('CheckRoles:admin',['except'=>['edit','update','show','create']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles','note','tags')->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id); 
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        
        $this->authorize('edit',$user);

      
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
      
        $user = User::findOrFail($id);
        $this->authorize('update',$user); 
        $user->update($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index')->with('status','El usuario actualizado correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        $this->authorize('destroy',$user);   
        $user->delete();
        return back()->with('status','Usuario eliminado Correctamente');;
    }
}
