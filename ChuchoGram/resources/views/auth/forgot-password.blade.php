<x-guest-layout>
<<<<<<< HEAD
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Escribe tu correo y te enviaremos una nueva contraseña.
    </div>

    @if (session('status'))
        <div class="mb-4 text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
=======
    <h2>Recuperar contraseña</h2>
    <p class="subtitle">Escribe tu correo y te enviaremos una nueva contraseña.</p>

    @if (session('status'))
        <div class="alert alert-success">
            ✅ {{ session('status') }}
>>>>>>> origin/master
        </div>
    @endif

    @if ($errors->any())
<<<<<<< HEAD
        <div class="mb-4 text-sm text-red-600 dark:text-red-400">
            {{ $errors->first() }}
=======
        <div class="alert alert-error">
            ⚠ {{ $errors->first() }}
>>>>>>> origin/master
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

<<<<<<< HEAD
        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required autofocus
                placeholder="tu@correo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('login') }}"
               class="text-sm text-gray-600 dark:text-gray-400 underline hover:text-gray-900">
                Volver al login
            </a>
            <x-primary-button>
                Enviar nueva contraseña
            </x-primary-button>
=======
        <div class="form-group">
            <label class="form-label" for="email">Correo electrónico</label>
            <input id="email" class="form-input" type="email" name="email"
                   value="{{ old('email') }}" required autofocus
                   placeholder="tu@correo.com">
            @error('email')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Enviar nueva contraseña
        </button>

        <div class="auth-links">
            <a class="auth-link" href="{{ route('login') }}">
                ← Volver al login
            </a>
>>>>>>> origin/master
        </div>
    </form>
</x-guest-layout>