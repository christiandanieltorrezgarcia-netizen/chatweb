<x-guest-layout>
<<<<<<< HEAD
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Cambia tu contraseña. Mínimo 8 caracteres.
    </div>

    @if ($errors->any())
        <div class="mb-4 text-sm text-red-600 dark:text-red-400">
            {{ $errors->first() }}
=======
    <h2>Cambiar contraseña</h2>
    <p class="subtitle">Elige una nueva contraseña segura. Mínimo 8 caracteres.</p>

    @if ($errors->any())
        <div class="alert alert-error">
            ⚠ {{ $errors->first() }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            ✅ {{ session('status') }}
>>>>>>> origin/master
        </div>
    @endif

    <form method="POST" action="{{ route('password.change.post') }}">
        @csrf

<<<<<<< HEAD
        <div>
            <x-input-label for="current_password" value="Contraseña actual" />
            <x-text-input id="current_password" class="block mt-1 w-full"
                type="password"
                name="current_password"
                required autofocus />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Nueva contraseña" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar nueva contraseña" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('chat') }}"
               class="text-sm text-gray-600 dark:text-gray-400 underline hover:text-gray-900">
                Cancelar
            </a>
            <x-primary-button>
                Guardar contraseña
            </x-primary-button>
=======
        <div class="form-group">
            <label class="form-label" for="current_password">Contraseña actual</label>
            <input id="current_password" class="form-input" type="password"
                   name="current_password" required autofocus placeholder="••••••••">
            @error('current_password')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <div class="divider"></div>

        <div class="form-group">
            <label class="form-label" for="password">Nueva contraseña</label>
            <input id="password" class="form-input" type="password"
                   name="password" required placeholder="••••••••">
            @error('password')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirmar nueva contraseña</label>
            <input id="password_confirmation" class="form-input" type="password"
                   name="password_confirmation" required placeholder="••••••••">
            @error('password_confirmation')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Guardar contraseña
        </button>

        <div class="auth-links">
            <a class="auth-link" href="{{ route('chat') }}">
                ← Cancelar y volver al chat
            </a>
>>>>>>> origin/master
        </div>
    </form>
</x-guest-layout>