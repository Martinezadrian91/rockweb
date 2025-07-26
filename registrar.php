<?php
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");

// Datos a enviar
$data = [
    "ip" => $ip,
    "user_agent" => $ua,
    "hora" => $time
];

// URL de tu base de datos Realtime Firebase
$url = "https://registros-29b03-default-rtdb.firebaseio.com/registros.json";

// Enviar con cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);
?>
