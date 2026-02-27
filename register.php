<?php
require 'config.php';
require 'vendor/autoload.php'; // PHPMailer

use PHPMailer\PHPMailer\PHPMailer;

$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];

// Generar contraseña aleatoria
$password = bin2hex(random_bytes(4));
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Guardar en BD
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, edad, correo, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $nombre, $edad, $correo, $hashedPassword);
$stmt->execute();

// Enviar correo
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tuCorreo@gmail.com';
    $mail->Password = 'tuClaveApp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('tuCorreo@gmail.com', 'Chat App');
    $mail->addAddress($correo);

    $mail->isHTML(true);
    $mail->Subject = 'Tu contraseña de acceso';
    $mail->Body    = "Hola $nombre,<br>Tu contraseña es: <b>$password</b>";

    $mail->send();
    echo "Usuario registrado y contraseña enviada por correo.";
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
?>
