<?php

class AsignacionRepository
{
    public static function getAsignacionByAlumnoId($alumno_id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM asignacion WHERE alumno_id = $alumno_id";
        $result = $connect->query($query);
        $asignaciones = array();
        while ($asignacion = $result->fetch_assoc()) {
            $asignaciones[] = new AsignacionModel($asignacion['id'], $asignacion['alumno_id'], $asignacion['empresa'], $asignacion['fecha_inicio'], $asignacion['fecha_fin'], $asignacion['tutor_id']);
        }
        return $asignaciones;
    }

    public static function getAsignacionByTutorId($tutor_id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM asignacion WHERE tutor_id = $tutor_id";
        $result = $connect->query($query);
        $asignaciones = array();
        while ($asignacion = $result->fetch_assoc()) {
            $asignaciones[] = new AsignacionModel($asignacion['id'], $asignacion['alumno_id'], $asignacion['empresa_id'], $asignacion['fecha_inicio'], $asignacion['fecha_fin'], $asignacion['tutor_id']);
        }
        return $asignaciones;
    }

    public static function addAsignacion($alumno_id, $empresa_id, $fecha_ini, $fecha_fin, $tutor_id)
    {
        $connect = Connection::connect();
        $query = "INSERT INTO asignacion (id, alumno_id, empresa_id, fecha_ini, fecha_fin, tutor_id) VALUES (NULL, '$alumno_id', '$empresa_id', '$fecha_ini', '$fecha_fin', '$tutor_id')";
        $result = $connect->query($query);
        if ($result) {
            return new AsignacionModel(null, $alumno_id, $empresa_id, $fecha_ini, $fecha_fin, $tutor_id);
        } else return false;
    }

    public static function updateAsignacion($id, $alumno_id, $empresa_id, $fecha_ini, $fecha_fin, $tutor_id)
    {
        $connect = Connection::connect();
        $query = "UPDATE asignacion SET alumno_id = '$alumno_id', empresa_id = '$empresa_id', fecha_ini = '$fecha_ini', fecha_fin = '$fecha_fin', tutor_id = '$tutor_id' WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return new AsignacionModel($id, $alumno_id, $empresa_id, $fecha_ini, $fecha_fin, $tutor_id);
        } else return false;
    }

    public static function deleteAsignacion($id)
    {
        $connect = Connection::connect();
        $query = "DELETE FROM asignacion WHERE id = $id";
        $result = $connect->query($query);
        if ($result) {
            return true;
        } else return false;
    }

    public static function getAsignacion()
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM asignacion";
        $result = $connect->query($query);
        $asignaciones = array();
        while ($asignacion = $result->fetch_assoc()) {
            $asignaciones[] = new AsignacionModel($asignacion['id'], $asignacion['alumno_id'], $asignacion['empresa_id'], $asignacion['fecha_ini'], $asignacion['fecha_fin'], $asignacion['tutor_id']);
        }
        return $asignaciones;
    }

    public static function getAsignacionById($id)
    {
        $connect = Connection::connect();
        $query = "SELECT * FROM asignacion WHERE id = $id";
        $result = $connect->query($query);
        if ($asignacion = $result->fetch_assoc()) {
            return new AsignacionModel($asignacion['id'], $asignacion['alumno_id'], $asignacion['empresa_id'], $asignacion['fecha_ini'], $asignacion['fecha_fin'], $asignacion['tutor_id']);
        } else return false;
    }
}