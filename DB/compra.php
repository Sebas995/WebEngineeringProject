<?php 
session_start();
require_once("conexion.php");

class Compra {
    public function ObtenerCompra($id) {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM compra WHERE id = ? LIMit 1;");
        $stmt->bind_param("", $id);

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["compra"] = $row;
            }
        } else {
            $_SESSION["compra_no_encontrada"]= "Compra no encontrada.";
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function ObtenerCompras() {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM compra;");

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $compras = array();
            while ($row = $result->fetch_assoc()) {
                $compras[] = $row;
            }

            $_SESSION["compras"] = $compras;
        } 

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function ObtenerComprasPorUsuario($usuario_id) {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT p.nombre, p.precio, c.estado, c.cantidad, c.creacion FROM compra c INNER JOIN publicacion p ON c.publicacion_id = p.id WHERE c.usuario_id = ?;");
        $stmt->bind_param("i", $usuario_id);

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $compras = array();
            while ($row = $result->fetch_assoc()) {
                $compras[] = $row;
            }

            $_SESSION["compras"] = $compras;
        } 

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function GuardarCompra($publicacion_id, $usuario_id, $estado, $cantidad)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $fecha_creacion = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO compra (publicacion_id, usuario_id, estado, cantidad, creacion) VALUES (?,?,?,?,?);");
        $stmt->bind_param("iisis", $publicacion_id, $usuario_id, $estado, $cantidad, $fecha_creacion);

        if ($stmt->execute()) {
            $_SESSION["compra_creada"] = "Compra realizada correctamente.";
        } else {
            $_SESSION["error_crear_compra"]= "Error al insertar compra: " . $stmt->error;
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }
}