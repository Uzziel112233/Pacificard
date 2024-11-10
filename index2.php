<?php
// Aquí puedes agregar cualquier contenido dinámico PHP que desees
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Principal</title>
    <script>
    // Script de JavaScript para hacer un ping al servidor cada 5 minutos
    setInterval(function() {
        fetch('ping.php')  // El archivo ping.php responde para mantener el servidor activo
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
    }, 5 * 60 * 1000); // 5 minutos en milisegundos
    </script>
</head>
<body>
    <h1>Bienvenido a mi página</h1>
    <p>Esta página está diseñada para mantenerse activa.</p>
    <!-- Aquí puedes agregar más contenido HTML o PHP según necesites -->
</body>
</html>
