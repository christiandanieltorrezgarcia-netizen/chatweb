<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 480px; margin: 0 auto; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,.1); }
        .header { background: #2b9af3; padding: 28px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; }
        .body { padding: 28px; color: #333; }
        .body p { line-height: 1.6; margin-bottom: 14px; }
        .password-box {
            background: #f0f8ff; border: 2px dashed #2b9af3;
            border-radius: 10px; padding: 18px; text-align: center; margin: 20px 0;
        }
        .password-box .label { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 1px; }
        .password-box .pwd { font-size: 28px; font-weight: bold; color: #2b9af3; letter-spacing: 3px; font-family: monospace; margin-top: 6px; }
        .footer { background: #f9f9f9; padding: 16px 28px; text-align: center; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>💬 Chuchogram</h1>
        </div>
        <div class="body">
            <p>Hola <strong>{{ $user->name }}</strong>,</p>
            <p>Tu cuenta en <strong>Chuchogram</strong> ha sido creada exitosamente.</p>
            <p>Tu contraseña generada automáticamente es:</p>

            <div class="password-box">
                <div class="label">Tu contraseña</div>
                <div class="pwd">{{ $passwordPlano }}</div>
            </div>

            <p>Usa tu correo <strong>{{ $user->email }}</strong> y esta contraseña para iniciar sesión.</p>
            <p>Te recomendamos guardar esta contraseña en un lugar seguro.</p>
        </div>
        <div class="footer">
            Este correo fue generado automáticamente · Chuchogram
        </div>
    </div>
</body>
</html>
=======
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
>>>>>>> origin/master
