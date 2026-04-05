<x-guest-layout>
    <h2>Recuperar contraseña</h2>
    <p class="subtitle">Escribe tu correo y te enviaremos una nueva contraseña.</p>

    @if (session('status'))
        <div class="alert alert-success">
            ✅ {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            ⚠ {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
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

        <button type="submit" class="btn btn-primary">
            Enviar nueva contraseña
        </button>

        <div class="auth-links">
            <a class="auth-link" href="{{ route('login') }}">
                ← Volver al login
            </a>
        </div>
    </form>
</x-guest-layout>