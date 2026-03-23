<x-guest-layout>
    <h2>Crear cuenta</h2>
    <p class="subtitle">Únete a ChuchoGram y empieza a chatear</p>

    <div class="alert alert-info">
        🔐 Se generará una contraseña automáticamente y se enviará a tu correo.
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

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
        </div>
    </form>
</x-guest-layout>