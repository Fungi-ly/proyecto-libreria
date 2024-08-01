<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO usuarios (nombre, email, contraseña, dirección, teléfono) VALUES ('$name', '$email', '$password', '$address', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
