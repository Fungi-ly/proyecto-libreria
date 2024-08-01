<?php
include 'db_connection.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $sql = "INSERT INTO libros (titulo, autor, precio, cantidad_en_inventario) VALUES ('$title', '$author', '$price', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo libro agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
