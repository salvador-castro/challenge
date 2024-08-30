<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function perfil()
    {
        $user = Auth::user();
        return view('user.perfil', compact('user'));
    }

    public function updatePerfil(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        try {
            $user->update($request->all());
            if ($request->hasFile('avatar')) {
                $user->avatar = guardarImg($request->avatar, 'avatar_' . $user->name, 'users', 200, 200, $user->avatar);
                $user->update();
            }
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->update();


            flash("Guardado Correctamente.")
                ->success()->important();
            return back();
        } catch (\Exception$ex) {
            flash("Error: {$ex->getMessage()}")->error()->important();
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new User);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new User);
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
        ]);
        try {
            $password = $request->password ?? Str::random(6);
            $arrayCreate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($password),
                'email_verified_at' => \Carbon\Carbon::now(),
                'phone' => $request->phone,
                'porcentaje' => $request->porcentaje,
                'active' => ($request->active) ? 1 : 0,
            ];

            $user = User::create($arrayCreate);

            if ($request->hasFile('avatar')) {
                $user->avatar = guardarImg($request->avatar, 'avatar_' . $user->name, 'users', 400, 400, $user->avatar);
                $user->update();
            }


            flash("La contraseña del usuario es: ".$password)->success()->important();

            flash("Guardado Correctamente.")
                ->success()->important();

            return redirect()->route('user.edit', $user);
        } catch (\Exception$ex) {
            flash("Error: {$ex->getMessage()}")->error()->important();
            return back();
        }
    }

    public function import(Request $request)
    {

        try {

            $file = $request->file('excel');
            $rows = \Excel::import(new UsuariosImport, $file);


            flash("Importados Correctamente.")
                ->success()->important();

            return back();
        } catch (\Exception$ex) {
            flash("Error: {$ex->getMessage()}")->error()->important();
            return back();
        }
    }

    public function export()
    {
        return \Excel::download(new \App\Exports\UserExport, 'usuarios.xlsx');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact(
            'user'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!Auth::user()->admin) {
            abort(403, 'No autorizado a ver esta sección');
        }
        $roles = Role::all();
        return view('users.edit', compact(
            'roles',
            'user'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $phone = str_replace('(', '', $request->phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace('-', '', $phone);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $phone;
            $user->porcentaje = $request->porcentaje;
            $user->active = ($request->active) ? 1 : 0;
            $user->save();



            if ($request->hasFile('avatar')) {
                $user->avatar = guardarImg($request->avatar, 'avatar_' . $user->name, 'users', 400, 400, $user->avatar);
            }   

            if ($request->password) {
                $user->password = bcrypt($request->password);
                flash("La nueva contraseña del usuario es: ".$request->password)->warning()->important();
            }

            $user->update();

            $user->roles()->detach();
            if ($request->filled('roles')) {
                $user->assignRole($request->roles);
            }
            \Artisan::call('cache:clear');

            flash("Actualizado Correctamente.")
                ->success()->important();

            return back();
        } catch (\Exception$ex) {
            flash("Error: {$ex->getMessage()}")->error()->important();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        if ($user->id == 1 || $user->id == 2) {
            abort(403, 'No se puede eliminar estos usuarios');
        }
        try {

            $pronosticos = Pronostico::where('user_id', $user->id)->delete();

            $user->delete();

            flash("Eliminado Correctamente.")
                ->success()->important();

            return back();
        } catch (\Exception$ex) {
            flash("Error: {ex->getMessage()}")->error()->important();
            return back();
        }
    }
}
