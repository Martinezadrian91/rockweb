<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dato = $_POST["dato"];  // Recibe el dato enviado desde sendData.html
    // Aquí puedes procesar o almacenar el dato como desees, por ejemplo:
    file_put_contents("dato.txt", $dato);  // Guarda el dato en un archivo dato.txt
    echo "Dato actualizado correctamente";
} else {
    echo "Acceso denegado";
}
?>

