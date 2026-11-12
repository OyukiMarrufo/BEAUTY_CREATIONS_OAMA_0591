<?php
include("conexion.php");
header('Content-Type: application/json');

// Recibir la lista completa de productos enviada en formato JSON
$datos = json_decode(file_get_contents("php://input"), true);

if (!empty($datos) && is_array($datos)) {
    $todo_ok = true;

    foreach ($datos as $item) {
        $producto = mysqli_real_escape_string($conexion, $item['nombre']);
        $precio = mysqli_real_escape_string($conexion, $item['precio']);
        $cliente = mysqli_real_escape_string($conexion, $item['cliente']);
        $direccion = mysqli_real_escape_string($conexion, $item['direccion']);
        $cantidad = intval($item['cantidad']);
        $pago = mysqli_real_escape_string($conexion, $item['pago']);

        $sql = "INSERT INTO pedidos (producto, precio, cliente, direccion, cantidad, pago) 
                VALUES ('$producto', '$precio', '$cliente', '$direccion', $cantidad, '$pago')";

        if (!$conexion->query($sql)) {
            $todo_ok = false;
            break;
        }
    }

    if ($todo_ok) {
        echo json_encode(["status" => "success", "message" => "¡Pago realizado y pedido guardado con éxito!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error en la base de datos: " . $conexion->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "El carrito está vacío."]);
}
?>