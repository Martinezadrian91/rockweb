<?php
// Guardar esto como proxy.php en tu servidor
header("Access-Control-Allow-Origin: *");
echo file_get_contents("dato.txt");
?>