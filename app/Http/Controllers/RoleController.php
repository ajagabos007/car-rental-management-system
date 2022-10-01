<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\AssignRoleRequest;

use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);
        
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AssignRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
    
        $role = Role::create(['name'=> $request->validated()['name'], 'guard_name'=> 'web']);
        Permission::all()->each(function ($permission) use (&$request, &$role){
            if(isset($request->validated()['permission_'.$permission->id]))
            $role->givePermissionTo($permission->id);
        });

        User::all()->each(function ($user) use (&$request, &$role){
            if(isset($request->validated()['user_'.$user->id]))
                $user->assignRole($role->id);
        });

        return redirect()->route('admin.roles.show',$role)->with('success','Role created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', ['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update(['name'=> $request->validated()['name']]);
        $permissions = [];

        Permission::all()->each(function ($permission) use (&$request, &$role, &$permissions){
            if(isset($request->validated()['permission_'.$permission->id]))
                array_push($permissions, $permission->id);
        });
        $role->syncPermissions($permissions);

        User::all()->each(function ($user) use (&$request, &$role, &$users){
            $user->removeRole($role->id);
            if(isset($request->validated()['user_'.$user->id]))
                $user->assignRole($role->id);
        });

        return redirect()->route('admin.roles.show', $role)->with('success','Role updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AssignRoleRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function assignRole(AssignRoleRequest $request, User $user)
    {
        $roles = [];
        Role::all()->each(function ($role) use (&$request, &$roles){
            if(isset($request->validated()['role_'.$role->id]))
                array_push($roles, $role->name);
        });
        $user->syncRoles($roles);

        return redirect()->back()->with('success','Roles updated Successfully');
    }
}
