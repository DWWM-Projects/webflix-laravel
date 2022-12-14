<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate = ([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required|accepted',
        ]);

        $user = User::create([
            'name' => str($request->email)->before('@'),
            'email' => $request->email,
            // Hash::make($request->password);
            'password' => bcrypt($request->password),

        ]);

        event(new Registered($user));
        // Mettre localhost sur MAIL_HOST dans le .env

        // Connexion à l'inscription
        Auth::login($user);

        return redirect('films');
    }
}
