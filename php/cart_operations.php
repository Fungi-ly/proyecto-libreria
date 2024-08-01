<?php
include 'db_connection.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];

    if (isset($_POST["remove_item"])) {
        $book_id = $_POST["remove_item"];
        $sql = "DELETE FROM carrito WHERE usuario_id = '$user_id' AND libro_id = '$book_id'";
    } else if (isset($_POST["place_order"])) {
        // Realizar pedido
        $sql = "SELECT * FROM carrito WHERE usuario_id = '$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $book_id = $row["libro_id"];
                $quantity = $row["cantidad"];
                $total = $row["monto_total"];

                $sql_order = "INSERT INTO pedidos (usuario_id, libro_id, cantidad, monto_total) VALUES ('$user_id', '$book_id', '$quantity', '$total')";
                $conn->query($sql_order);
            }

            // Vaciar carrito
            $sql_empty_cart = "DELETE FROM carrito WHERE usuario_id = '$user_id'";
            $conn->query($sql_empty_cart);

            echo "Pedido realizado exitosamente";
        } else {
            echo "No hay artículos en el carrito";
        }
    } else {
        $book1_quantity = $_POST["book1_quantity"];
        $sql = "UPDATE carrito SET cantidad = '$book1_quantity' WHERE usuario_id = '$user_id' AND libro_id = 1";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Carrito actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
