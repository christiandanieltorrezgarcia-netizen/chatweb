<x-guest-layout>
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
        </div>
    @endif

    <form method="POST" action="{{ route('password.change.post') }}">
        @csrf

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
        </div>
    </form>
</x-guest-layout>