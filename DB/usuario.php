<?php

class Usuario {
    function ObtenerUsuario($id)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("SELECT * FROM usuario WHERE id = ?;");
        $stmt->bind_param("", $id);

        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["usuario"] = $row;
            }
        } else {
            $_SESSION["usuario_no_encontrado"]= "Usuario no encontrado.";
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    function GuardarUsuario($nombres, $apellidos, $correo, $contrasena)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $fecha_creacion = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO usuario (nombres, apellidos, correo, contrasena, creacion) VALUES (?,?,?,?,?);");
        $stmt->bind_param("", $nombres,$apellidos, $correo, $contrasena, $fecha_creacion);

        if ($stmt->execute()) {
            $_SESSION["usuario_creado"] = "Nuevo usuario insertado correctamente.";
        } else {
            $_SESSION["error_crear_usuario"]= "Error al insertar usuario: " . $stmt->error;
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    function ActualizarUsuario($id, $nombres, $apellidos, $correo, $contrasena)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $fecha_actualizacion = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("UPDATE usuario SET nombres = ?, apellidos = ?, correo = ?, contrasena = ?, modificacion = ? WHERE id = ?;");
        $stmt->bind_param("", $nombres,$apellidos, $correo, $contrasena, $fecha_actualizacion, $id);

        if ($stmt->execute()) {
            $_SESSION["usuario_modificado"] = "Usuario modificado correctamente.";
        } else {
            $_SESSION["error_modificar_usuario"]= "Error al modificar usuario: " . $stmt->error;
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }

    function ActualizarUltimoIngreso($id)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $fecha_ultimo_inicio = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("UPDATE usuario SET ultimo_inicio = ? WHERE id = ?;");
        $stmt->bind_param("", $fecha_ultimo_inicio, $id);

        $stmt->execute();

        $stmt->close();
        $startDB->CloseDB($conn); 
    }


    function EliminarUsuario($id)  {
        $startDB = new DB();

        $conn = $startDB->StartDB();

        $stmt = $conn->prepare("DELETE FROM usuario WHERE id = ?;");
        $stmt->bind_param("",  $id);

        if ($stmt->execute()) {
            $_SESSION["usuario_eliminado"] = "Usuario eliminado correctamente.";
        } else {
            $_SESSION["error_eliminar_usuario"]= "Error al eliminar usuario: " . $stmt->error;
        }

        $stmt->close();
        $startDB->CloseDB($conn); 
    }
}