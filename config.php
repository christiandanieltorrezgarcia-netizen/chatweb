<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "chatdb";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$chat_secret_key = "mi_clave_super_segura_32bytes";
?>
