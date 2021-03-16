<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
  public function show()
  {
    $users = User::orderBy('created_at','asc')->with('roles')->get();
    return view('user.show',compact('users'));
  }

  public function edit(User $user)
  {
    $roles = Role::with('permissions')->get();
    return view('user.edit',compact('user','roles'));
  }

    public function update(User $user, Request $request)
    {
      $this->validate(
        $request,
        [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',

        ],
        [

        ],
        [
          'name' => 'Nombre',
          'email' => 'Email',
          'role_id' => 'Rol',
        ]
      );

      $user->fill($request->all());
      $user->save();
      $role = Role::where('id',$request->role_id)->first();
      $user->syncRoles($role);

      return redirect()->route('user-show')->with('warning','Se ha editado al cliente.');
    }

}
