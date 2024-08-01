<?php
include 'db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["contraseña"])) {
            $_SESSION["user_id"] = $row["ID"];
            $_SESSION["user_name"] = $row["nombre"];
            header("Location: ../index.html");
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró el usuario";
    }

    $conn->close();
}
?>
