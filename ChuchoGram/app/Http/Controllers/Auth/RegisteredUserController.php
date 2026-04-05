<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordGenerada;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'edad'  => ['required', 'integer', 'min:1', 'max:120'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ], [
            'name.required'  => 'El nombre es obligatorio.',
            'edad.required'  => 'La edad es obligatoria.',
            'edad.integer'   => 'La edad debe ser un número.',
            'email.required' => 'El correo es obligatorio.',
            'email.email'    => 'Ingresa un correo válido.',
            'email.unique'   => 'Este correo ya está registrado.',
        ]);

        $passwordPlano = Str::random(6) . rand(10, 99) . '!';

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'edad'     => $request->edad,
            'password' => Hash::make($passwordPlano),
        ]);

        event(new Registered($user));

        try {
            Mail::to($user->email)->send(new PasswordGenerada($user, $passwordPlano));
        } catch (\Exception $e) {
            Log::error('Error enviando correo: ' . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('chat');
    }
}