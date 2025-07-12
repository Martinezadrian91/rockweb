<?php
$ip = $_SERVER['REMOTE_ADDR'];
$fecha = date("Y-m-d H:i:s");
$archivo = "visitas.txt";

if (file_put_contents($archivo, "$fecha - $ip\n", FILE_APPEND)) {
    http_response_code(200);
    echo "OK";
} else {
    http_response_code(500);
    echo "Error al guardar";
}
?>