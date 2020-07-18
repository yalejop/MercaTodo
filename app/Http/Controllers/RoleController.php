<?php

namespace App\Http\Controllers;

use App\Permission\Model\Permission;
use App\Permission\Model\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveAccess', 'role.index');
        $roles = Role::orderBy('id', 'Desc')->paginate(3);
        
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveAccess', 'role.create');
        $permissions = Permission::get();

        return view('role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveAccess', 'role.create');
        $request->validate([
            'name' => 'required|max:50|unique:roles,name',
            'slug' => 'required|max:50|unique:roles,slug',
            'full-access' => 'required|in:yes,no'
        ]);

        $role = Role::create($request->all());

        //if ($request->get('permission')) {
            //return $request->all();
            $role->permissions()->sync($request->get('permission'));
        //}

        return redirect()->route('role.index')->with('status_success', 'Role Saved Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('haveAccess', 'role.show');
        $permission_role = [];

        foreach($role->permissions as $permission) {
            $permission_role[] = $permission->id;
        }

        $permissions = Permission::get();

        return view('role.view', compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('haveAccess', 'role.edit');
        $permission_role = [];

        foreach($role->permissions as $permission) {
            $permission_role[] = $permission->id;
        }

        $permissions = Permission::get();

        return view('role.edit', compact('permissions', 'role', 'permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('haveAccess', 'role.edit');
        $request->validate([
            'name' => 'required|max:50|unique:roles,name,'.$role->id,
            'slug' => 'required|max:50|unique:roles,slug,'.$role->id,
            'full-access' => 'required|in:yes,no'
        ]);

        $role->update($request->all());

        //if ($request->get('permission')) {
            //return $request->all();
            $role->permissions()->sync($request->get('permission'));
        //}

        return redirect()->route('role.index')->with('status_success', 'Role Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('haveAccess', 'role.destroy');
        $role->delete();

        return redirect()->route('role.index')->with('status_success', 'Role  Succesfully removed');
    }
}
