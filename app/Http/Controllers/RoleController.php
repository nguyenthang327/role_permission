<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index(){
        $roles = Role::get();
        return view('roles', compact('roles'));
    }

    public function show($id) {
        $role = Role::with(['permissions'])
            ->where('id', $id)->first();
        if(!$role){
            abort(404);
        }
        $permissions = Permission::with(['childPermission'])
            ->where('parent_id', null)->get();
            // dd($permissions->toArray());
        return view('role-detail', compact('role', 'permissions'));
    }

    public function store(Request $request, $id){
        $role = Role::with(['permissions'])
            ->where('id', $id)
            ->first();
        if(!$role){
            abort(404);
        }

        $role->permissions()->sync($request->flags);
        return back();
    }
}
