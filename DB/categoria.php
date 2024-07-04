<?php 
session_start();
require_once("conexion.php");

class Categoria {
    public function ObtenerCategoria($nombre)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM categoria WHERE nombre = ? LIMIT 1;");
        $stmt->bind_param("s", $id);

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["categoria"] = $row;
            }
        } else {
            $_SESSION["categoria_no_encontrada"]= "Categoria no encontrado.";
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function ObtenerCategorias()  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM categoria");

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $categorias = array();
            while ($row = $result->fetch_assoc()) {
                $categorias[] = $row;
            }

            $_SESSION["categorias"] = $categorias;
        } 

        $stmt->close();
        $startDB->CloseDB($conn); 
    }
}