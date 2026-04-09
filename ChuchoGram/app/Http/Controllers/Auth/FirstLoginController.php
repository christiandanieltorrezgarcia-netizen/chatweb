<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FirstLoginController extends Controller
{
    // Muestra el formulario
    public function show(Request $request)
    {
        $email = $request->query('email');

        if (!$email) {
            return redirect()->route('login');
        }

        return view('auth.first-login', compact('email'));
    }

    // Procesa la contraseña
    public function store(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        // Verificar que el usuario existe y la contraseña es correcta
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'La contraseña es incorrecta. Revisa tu correo.',
            ])->withInput(['email' => $request->email]);
        }

        Auth::login($user);

        return redirect()->route('chat');
    }
}