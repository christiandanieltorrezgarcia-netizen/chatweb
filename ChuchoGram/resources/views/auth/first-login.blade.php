<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        ¡Registro exitoso! Revisa tu correo y escribe la contraseña que te enviamos.
    </div>

    @if ($errors->any())
        <div class="mb-4 text-sm text-red-600">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('first.login.post') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email }}">

        <div>
            <x-input-label for="password" value="Contraseña recibida en tu correo" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autofocus />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Entrar al chat
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>