<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Cambia tu contraseña. Mínimo 8 caracteres.
    </div>

    @if ($errors->any())
        <div class="mb-4 text-sm text-red-600 dark:text-red-400">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.change.post') }}">
        @csrf

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
        </div>
    </form>
</x-guest-layout>