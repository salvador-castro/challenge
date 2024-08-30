<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('delete', new User);
        return view('roles.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        $this->authorize('delete', new User);
        $group = array_unique(Permission::all()->pluck('group_name')->toArray());

        return view('roles.create', [
            'permisos' => Permission::all(),
            'group' => $group,
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('delete', new User);
        try {

            $role = new Role;
            $role->name = trim($request->name);
            $role->save();

            $role->permissions()->detach();

            if ($request->has('permissions')) {
                $role->givePermissionTo($request->permissions);
            }

            flash("El Role <strong>{$role->name}</strong> se creó correctamente.")
                ->success()->important();

            return redirect()->route('roles.edit', $role);

        } catch (\Exception $ex) {

            flash($ex->getMessage())
                ->error()->important();

            return back();

        }
    }

    public function edit(Role $role)
    {
        $this->authorize('delete', new User);
        $group = array_unique(Permission::all()->pluck('group_name')->toArray());

        return view('roles.edit', [
            'role' => $role,
            'group' => $group,
            'permisos' => Permission::all(),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('delete', new User);
        try {

            $role->permissions()->detach();

            if ($request->has('permissions')) {
                $role->givePermissionTo($request->permissions);
            }

            cache()->forget('spatie.permission.cache');

            flash("El role <strong>{$role->name}</strong> se actualizó correctamente.")
                ->success()->important();

            return back();

        } catch (\Exception $ex) {

            flash($ex->getMessage())
                ->error()->important();

            return back();
        }
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', new User);
        try {

            if ($role->id == 1) {
                throw new \Exception("No se puede eliminar el rol SuperAdmin.");
            }

            $name = $role->name;

            $role->permissions()->detach();

            $role->delete();

            flash("El role <strong>{$name}</strong> se eliminó correctamente.")
                ->success()->important();

            return back();

        } catch (\Exception $ex) {

            flash($ex->getMessage())
                ->error()->important();

            return back();

        }
    }
}
