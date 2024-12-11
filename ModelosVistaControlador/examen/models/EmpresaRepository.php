<?php

class EmpresaRepository
{
    public static function getEmpresas()
    {
        $conexion = Connection::connect();
        $query = "SELECT * FROM empresa";
        $resultado = $conexion->query($query);
        $empresas = array();
        while ($fila = $resultado->fetch_assoc()) {
            $empresas[] = new EmpresaModel($fila['id'], $fila['nombre'], $fila['nif'], $fila['telefono'], $fila['tutor_laboral'], $fila['email']);
        }
        return $empresas;
    }

    public static function getEmpresaById($id)
    {
        $conexion = Connection::connect();
        $query = "SELECT * FROM empresa WHERE id = $id";
        $resultado = $conexion->query($query);
        if ($fila = $resultado->fetch_assoc()) {
            // Crear instancia de EmpresaModel con los datos obtenidos
            $empresa = new EmpresaModel(
                $fila['id'],
                $fila['nombre'],
                $fila['nif'],
                $fila['telefono'],
                $fila['tutor_laboral'],
                $fila['email']
            );
            return $empresa;
        } else {
            // Manejar caso de error o no encontrado
            throw new Exception("No se encontró ninguna empresa con el ID: " . $id);
        }
    }

    public static function addEmpresa($nombre, $nif, $tutorLaboral, $telefono, $email)
    {
        $conexion = Connection::connect();
        $query = "INSERT INTO empresa (nombre, nif, telefono, tutor_laboral, email) VALUES ('$nombre', '$nif', '$telefono', '$tutorLaboral', '$email')";
        $resultado = $conexion->query($query);
        return $resultado;
    }

    public static function updateEmpresa($id, $nombre, $nif, $tutorLaboral, $telefono, $email)
    {
        $conexion = Connection::connect();
        $query = "UPDATE empresa SET nombre = '$nombre', nif = '$nif', telefono = '$telefono', tutor_laboral = '$tutorLaboral', email = '$email' WHERE id = $id";
        $resultado = $conexion->query($query);
        return $resultado;
    }

    public static function deleteEmpresa($id)
    {
        $conexion = Connection::connect();
        $query = "DELETE FROM empresa WHERE id = $id";
        $resultado = $conexion->query($query);
        return $resultado;
    }
}