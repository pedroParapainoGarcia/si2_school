<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    public function _construct()
    {

        $this->middleware('can:roles.index')->only('index','show');
        $this->middleware('can:roles.create')->only('create', 'store');
        $this->middleware('can:roles.edit')->only('edit', 'update');
        $this->middleware('can:roles.destroy')->only('destroy');
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::all();
        return view('admin.roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        $role->save();

        return redirect()->route('roles.index')
            ->with('mensaje', 'Se registro el rol de la manera correcta')
            ->with('icono', 'success');
    }

    public function edit($id)
    {
        $rol = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = $rol->permissions->pluck('name')->all();

        return view('admin.roles.edit', compact('rol', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        $rol = Role::findOrFail($id);
        return view('admin.roles.show', ['rol' => $rol]);
    }


    public function destroy($id)
    {
        $rol = Role::find($id);

        $rol->delete();
        return redirect()->route('admin.roles.index');
    }
}
