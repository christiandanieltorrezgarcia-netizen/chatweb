<?php
session_start();
require 'config.php';

$correo = $_POST['correo'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE correo=?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if (password_verify($password, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        header("Location: chat.php");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
?>
