<x-guest-layout>
    <h2>Crear cuenta</h2>
    <p class="subtitle">Únete a ChuchoGram y empieza a chatear</p>

    <div class="alert alert-info">
        🔐 Se generará una contraseña automáticamente y se enviará a tu correo.
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

<<<<<<< HEAD
        <!-- Nombre -->
        <div>
            <x-input-label for="name" value="Nombre completo" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu nombre" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Edad -->
        <div class="mt-4">
            <x-input-label for="edad" value="Edad" />
            <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad" :value="old('edad')" required min="1" max="120" placeholder="Ej: 20" />
            <x-input-error :messages="$errors->get('edad')" class="mt-2" />
        </div>

        <!-- Correo -->
        <div class="mt-4">
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="tu@correo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nota informativa: contraseña automática -->
        <div class="mt-4 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg text-sm text-blue-700 dark:text-blue-300">
            🔐 Se generará una contraseña automáticamente y se enviará a tu correo.
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                ¿Ya tienes cuenta?
            </a>

            <x-primary-button class="ms-4">
                Crear cuenta
            </x-primary-button>
=======
        <div class="form-group">
            <label class="form-label" for="name">Nombre completo</label>
            <input id="name" class="form-input" type="text" name="name"
                   value="{{ old('name') }}" required autofocus
                   placeholder="Tu nombre">
            @error('name')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="edad">Edad</label>
            <input id="edad" class="form-input" type="number" name="edad"
                   value="{{ old('edad') }}" required min="1" max="120"
                   placeholder="Ej: 20">
            @error('edad')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Correo electrónico</label>
            <input id="email" class="form-input" type="email" name="email"
                   value="{{ old('email') }}" required
                   placeholder="tu@correo.com">
            @error('email')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Crear cuenta
        </button>

        <div class="auth-links">
            <a class="auth-link" href="{{ route('login') }}">
                ← ¿Ya tienes cuenta? Inicia sesión
            </a>
>>>>>>> origin/master
        </div>
    </form>
</x-guest-layout>