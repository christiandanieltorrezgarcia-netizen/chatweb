<?php
session_start();
require 'config.php';
require 'crypto.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = $_POST['mensaje'];
    $usuario_id = $_SESSION['usuario_id'];

    $mensajeCifrado = encryptMessage($mensaje, $chat_secret_key);

    $stmt = $conn->prepare("INSERT INTO mensajes (usuario_id, mensaje) VALUES (?, ?)");
    $stmt->bind_param("is", $usuario_id, $mensajeCifrado);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Chat Seguro</title>
</head>
<body>
  <h2>Bienvenido al chat cifrado</h2>
  <form method="POST">
    <input type="text" name="mensaje" placeholder="Escribe tu mensaje" required>
    <button type="submit">Enviar</button>
  </form>

  <h3>Mensajes:</h3>
  <div>
    <?php
    $result = $conn->query("SELECT u.nombre, m.mensaje, m.fecha 
                            FROM mensajes m 
                            JOIN usuarios u ON m.usuario_id=u.id 
                            ORDER BY m.fecha DESC");
    while ($row = $result->fetch_assoc()) {
        $mensajeDescifrado = decryptMessage($row['mensaje'], $chat_secret_key);
        echo "<p><b>{$row['nombre']}:</b> {$mensajeDescifrado} <i>({$row['fecha']})</i></p>";
    }
    ?>
  </div>
  <a href="logout.php">Cerrar sesión</a>
</body>
</html>
