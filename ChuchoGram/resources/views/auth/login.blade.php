<x-guest-layout>
    <h2>Bienvenido de nuevo</h2>
    <p class="subtitle">Inicia sesión para continuar en ChuchoGram</p>

    @if (session('status'))
        <div class="alert alert-success">
            ✅ {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="email">Correo electrónico</label>
            <input id="email" class="form-input" type="email" name="email"
                   value="{{ old('email') }}" required autofocus
                   placeholder="tu@correo.com">
            @error('email')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Contraseña</label>
            <input id="password" class="form-input" type="password" name="password"
                   required placeholder="••••••••">
            @error('password')
                <div class="form-error">⚠ {{ $message }}</div>
            @enderror
        </div>

        <div class="checkbox-group">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Recordarme</label>
        </div>

        <button type="submit" class="btn btn-primary">
            Iniciar sesión
        </button>

        <div class="auth-links">
            @if (Route::has('password.request'))
<<<<<<< HEAD
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900"
            href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
            </a>                
=======
                <a class="auth-link" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
>>>>>>> origin/master
            @endif
            <a class="auth-link" href="{{ route('register') }}">
                Crear cuenta →
            </a>
        </div>
    </form>
</x-guest-layout>