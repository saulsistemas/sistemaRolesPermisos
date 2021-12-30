<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $users=User::where('name','LIKE','%'.$busqueda.'%')
        ->orWhere('email','LIKE','%'.$busqueda.'%')
        ->latest('id')
        ->paginate(2);
        return view('admin.users.index',compact('users','busqueda'));
    }

     
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

   
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit',$user)->with('info','Se asignó Rol correctament');
    }

   
    
}
