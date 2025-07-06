<!DOCTYPE html>
<html>
<head>
    <title>Dato Actualizado</title>
    <script>
        function actualizarDato() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("estadoActualizacion").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "actualizar_dato.php", true);  // Archivo PHP para actualizar dato
            xhttp.send();
        }
    </script>
</head>
<body>
    <h1>Estado de Actualización del Dato</h1>
    <div id="estadoActualizacion">
        <?php
        $dato_actual = file_get_contents("dato.txt");  // Lee el dato almacenado en dato.txt
        if ($dato_actual) {
            echo "<p>Último dato actualizado: $dato_actual</p>";
        } else {
            echo "<p>Aún no hay datos actualizados</p>";
        }
        ?>
    </div>
    <button onclick="actualizarDato()">Actualizar Dato</button>
</body>
</html>
