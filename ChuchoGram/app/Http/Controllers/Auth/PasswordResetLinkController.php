<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'El correo es obligatorio.',
            'email.email'    => 'Ingresa un correo válido.',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No encontramos una cuenta con ese correo.']);
        }

        // Generar nueva contraseña aleatoria
        $nuevaPassword = \Illuminate\Support\Str::random(6) . rand(10, 99) . '!';

        // Guardar en la BD
        $user->update([
            'password' => \Illuminate\Support\Facades\Hash::make($nuevaPassword),
        ]);

        // Enviar por correo
        try {
            \Illuminate\Support\Facades\Mail::to($user->email)
                ->send(new \App\Mail\PasswordGenerada($user, $nuevaPassword));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error enviando correo: ' . $e->getMessage());
        }

        return back()->with('status', '¡Listo! Revisa tu correo con tu nueva contraseña.');
    }
}