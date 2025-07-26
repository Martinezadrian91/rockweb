<?php
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$hora = date("Y-m-d H:i:s");

$data = [
    "ip" => $ip,
    "user_agent" => $ua,
    "hora" => $hora
];

// URL de tu base de datos Firebase (con /registros.json al final)
$url = "https://registros-29b03-default-rtdb.firebaseio.com/registros.json";

// Enviar a Firebase usando cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);

// Devolver una imagen invisible para evitar errores
header('Content-Type: image/png');
echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAEklEQVR42mP8/5+hHgAHggJ/P6ZRMwAAAABJRU5ErkJggg==');
?>
