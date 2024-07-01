<?php 

class Publicacion {
    public function ObtenerPublicacion($id) {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM publicacion WHERE id = ? LIMit 1;");
        $stmt->bind_param("", $id);

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["publicacion"] = $row;
            }
        } else {
            $_SESSION["publicacion_no_encontrada"]= "Publicacion no encontrada.";
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function ObtenerPublicacionesPorCategoria($categoria_id) {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM publicacion WHERE categoria_id = ?;");
        $stmt->bind_param("", $categoria_id);

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $publicaciones = array();
            while ($row = $result->fetch_assoc()) {
                $publicaciones[] = $row;
            }

            $_SESSION["publicaciones"] = $publicaciones;
        } 

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function ObtenerPublicaciones()  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM publicacion");

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $publicaciones = array();
            while ($row = $result->fetch_assoc()) {
                $publicaciones[] = $row;
            }

            $_SESSION["publicaciones"] = $publicaciones;
        } 

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function GuardarPublicacion($nombre, $descripcion, $imagen, $precio, $cantidad, $usuario_id, $categoria_id)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $fecha_creacion = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO publicacion (nombre, descripcion, imagen, precio, cantidad, usuario_id, categoria_id, creacion) VALUES (?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param("", $nombre, $descripcion, $imagen, $precio, $cantidad, $usuario_id, $categoria_id, $fecha_creacion);

        if ($stmt->execute()) {
            $_SESSION["publicacion_creada"] = "Nueva publicacion insertada correctamente.";
        } else {
            $_SESSION["error_crear_publicacion"]= "Error al insertar publicacion: " . $stmt->error;
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function ActualizarPublicacion($id, $nombre, $descripcion, $imagen, $precio, $cantidad, $usuario_id, $categoria_id)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $fecha_creacion = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("UPDATE publicacion SET nombre = ?, descripcion = ?, imagen = ?, precio = ?, precio = ?, cantidad = ?, usuario_id = ?, categoria_id = ?, modificacion = ? WHERE id = ?;");
        $stmt->bind_param("", $nombre, $descripcion, $imagen, $precio, $cantidad, $usuario_id, $categoria_id, $fecha_creacion, $id);

        if ($stmt->execute()) {
            $_SESSION["publicacion_actualizada"] = "Publicacion actualizada correctamente.";
        } else {
            $_SESSION["error_actualizar_publicacion"]= "Error al actualizar publicacion: " . $stmt->error;
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    public function EliminarPublicacion($id)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("DELETE FROM publicacion WHERE id = ?;");
        $stmt->bind_param("", $id);

        if ($stmt->execute()) {
            $_SESSION["publicacion_eliminada"] = "Publicacion eliminada correctamente.";
        } else {
            $_SESSION["error_eliminar_publicacion"]= "Error al eliminar publicacion: " . $stmt->error;
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }
}