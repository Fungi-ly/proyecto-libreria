<?php
$servername = "localhost"; // o el nombre del servidor donde esté tu base de datos
$username = "root"; // tu usuario de MySQL
$password = ""; // tu contraseña de MySQL
$dbname = "libreria"; // el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
