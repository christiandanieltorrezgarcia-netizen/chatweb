@component('mail::message')
# Bienvenido a ChuchoGram, {{ $user->name }}! 👋

Tu cuenta ha sido creada exitosamente.

Tu contraseña temporal es:

@component('mail::panel')
**{{ $passwordPlano }}**
@endcomponent

Te recomendamos cambiarla después de iniciar sesión.

@component('mail::button', ['url' => config('app.url') . '/login'])
Iniciar sesión
@endcomponent

Gracias,
**El equipo de ChuchoGram**
@endcomponent