<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        dd('Registro Cerrado');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $player = Player::where('email', $request->email)->first();

        if ($player) {
            flash('Ya estabas en nuestra base de datos, agregamos tu historial a este usuario. No olvides completar tu perfil')->success();
            $player->user_id = $user->id;
            $player->save();
        } else {
            flash('Bienvenido! no olvides completar tu perfil')->success();
            $newPlayer = new Player();
            $newPlayer->user_id = $user->id;
            $newPlayer->email = $request->email;
            $newPlayer->save();
        }
        

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
