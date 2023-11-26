<?php
// Incluye tu archivo de configuración PDO aquí
require 'config.php';

// Establecer la configuración de cabecera HTTP adecuada
header('Content-Type: application/json');

// Leer la solicitud HTTP y determinar el tipo de operación
$method = $_SERVER['REQUEST_METHOD'];

// Realizar la operación correspondiente en función del tipo de solicitud
switch ($method) {
    case 'GET':
        if (!isset($_GET['id'])) {
            // Obtener todos los registros
            $stmt = $pdo->query("SELECT * FROM empleados");
            $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($elementos);
        } else {
            // Obtener un registro en particular
            $id = intval($_GET['id']);
            $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $elementos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($elementos);
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $nombre = $input['nombre'];
        $correo = filter_var($input['correo'], FILTER_SANITIZE_EMAIL);

        // Insertar un nuevo registro en la base de datos
        $sql = "INSERT INTO empleados (nombre, correo) VALUES (:nombre, :correo)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'correo' => $correo]);
        
        $data = ['estado' => true, 'id' => $pdo->lastInsertId()];
        echo json_encode($data);
        break;

    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = intval($input['id']);
        $nombre = $input['nombre'];
        $correo = filter_var($input['correo'], FILTER_SANITIZE_EMAIL);

        // Actualizar el registro en la base de datos
        $sql = "UPDATE empleados SET nombre = :nombre, correo = :correo WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'correo' => $correo, 'id' => $id]);

        $data = ['estado' => true];
        echo json_encode($data);
        break;

    case 'DELETE':
        $id = intval($_GET['id']);

        // Eliminar el registro de la base de datos
        $sql = "DELETE FROM empleados WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        http_response_code(200);
        $data = ['estado' => true];
        echo json_encode($data);
        break;

    default:
        // Manejo de otros métodos
        break;
}

// No olvides cerrar la conexión PDO al final del script
$pdo = null;
