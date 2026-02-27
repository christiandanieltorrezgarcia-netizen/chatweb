<?php
function encryptMessage($mensaje, $clave) {
    $iv = openssl_random_pseudo_bytes(16);
    $cifrado = openssl_encrypt($mensaje, "AES-256-CBC", $clave, 0, $iv);
    return base64_encode($iv . $cifrado);
}

function decryptMessage($mensajeCifrado, $clave) {
    $data = base64_decode($mensajeCifrado);
    $iv = substr($data, 0, 16);
    $cifrado = substr($data, 16);
    return openssl_decrypt($cifrado, "AES-256-CBC", $clave, 0, $iv);
}
?>
