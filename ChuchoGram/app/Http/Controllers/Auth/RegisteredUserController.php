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
<<<<<<< HEAD
    /**
     * Muestra el formulario de registro.
     */
=======
>>>>>>> origin/master
    public function create(): View
    {
        return view('auth.register');
    }

<<<<<<< HEAD
    /**
     * Procesa el registro: genera contraseña aleatoria y la envía por correo.
     */
=======
>>>>>>> origin/master
    public function store(Request $request): RedirectResponse
    {
        // CORRECCIÓN 1: Solo pedimos nombre, edad y correo.
        // La contraseña se genera automáticamente — el usuario NO la escribe.
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'edad'  => ['required', 'integer', 'min:1', 'max:120'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ], [
            'name.required'  => 'El nombre es obligatorio.',
            'edad.required'  => 'La edad es obligatoria.',
<<<<<<< HEAD
            'edad.integer'   => 'La edad debe ser un número entero.',
=======
            'edad.integer'   => 'La edad debe ser un número.',
>>>>>>> origin/master
            'email.required' => 'El correo es obligatorio.',
            'email.email'    => 'Ingresa un correo válido.',
            'email.unique'   => 'Este correo ya está registrado.',
        ]);

<<<<<<< HEAD
        // Generar contraseña aleatoria segura (letras + números + símbolo)
=======
>>>>>>> origin/master
        $passwordPlano = Str::random(6) . rand(10, 99) . '!';

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'edad'     => $request->edad,
            'password' => Hash::make($passwordPlano),
        ]);

        event(new Registered($user));

<<<<<<< HEAD
        // CORRECCIÓN 2: El Mail::send estaba DESPUÉS del return (nunca se ejecutaba).
        // Ahora se envía ANTES de redirigir.
        try {
            Mail::to($user->email)->send(new PasswordGenerada($user, $passwordPlano));
        } catch (\Exception $e) {
            // Si el correo falla, el registro igual continúa.
            // Revisa storage/logs/laravel.log para ver el error.
            Log::error('Error enviando correo de bienvenida: ' . $e->getMessage());
        }

        return redirect()->route('first.login', ['email' => $user->email]);
=======
        try {
            Mail::to($user->email)->send(new PasswordGenerada($user, $passwordPlano));
        } catch (\Exception $e) {
            Log::error('Error enviando correo: ' . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('chat');
>>>>>>> origin/master
    }
}