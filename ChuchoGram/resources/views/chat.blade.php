<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
</head>
<body>

<h2>Chat</h2>

<form method="POST" action="{{ route('chat') }}">
    @csrf

    <input type="text" name="mensaje" placeholder="Escribe un mensaje">

    <button type="submit">Enviar</button>
</form>

<hr>

@foreach($messages as $mensaje)
    <p>{{ $mensaje->mensaje }}</p>
@endforeach

</body>
</html>